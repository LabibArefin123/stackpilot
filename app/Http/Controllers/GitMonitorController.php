<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\GitRepositoryScanner;
use App\Services\GitShowInformation;

class GitMonitorController extends Controller
{
    protected GitShowInformation $gitShowInformation;
    public function __construct(GitShowInformation $gitShowInformation)
    {
        $this->gitShowInformation = $gitShowInformation;
    }
    /**
     * Git Dashboard
     */
    public function index(GitRepositoryScanner $scanner)
    {
        $scanner->scan();

        $projects = Project::with([
            'environment',
            'health'
        ])->where('project_type', 'Laravel')
            ->orderBy('name')->get();

        return view(
            'backend.git_page.index',
            compact('projects')
        );
    }

    public function gitAjax(Request $request)
    {
        $query = Project::with([
            'environment',
            'health'
        ])->where('project_type', 'Laravel');

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('domain', 'like', "%{$search}%")
                    ->orWhere('git_branch', 'like', "%{$search}%");
            });
        }

        if ($request->branch != 'All') {
            $query->where('git_branch', $request->branch);
        }

        if ($request->status == 'Healthy') {
            $query->where('is_active', 1);
        }

        if ($request->status == 'Inactive') {
            $query->where('is_active', 0);
        }

        $projects = $query
            ->orderBy('name')
            ->get();

        return view(
            'backend.partials.git_page.index',
            compact('projects')
        );
    }
    /**
     * Repository Details
     */
    public function show(Project $project, GitRepositoryScanner $scanner)
    {
        $scanner->scan();
        // $project->refresh();
        $project->load([
            'environment',
            'health',
        ]);

        // dd($project);
        // Use the same repository finder used on the index page
        $gitPath = $scanner->findRepository($project);
        // dd($gitPath);
        $git = $this->gitShowInformation->loadGitInformation(
            $project,
            $gitPath
        );

        dd($git);
        if (!$this->gitShowInformation->validateRepository($gitPath)) {

            return view('backend.git_page.show', [

                'project' => $project,

                'git' => $git,

                'repositoryStatus' => [
                    'exists' => false,
                    'clean' => false,
                    'status' => 'Repository Not Found',
                    'badge' => 'danger',
                    'icon' => 'fas fa-times-circle',
                    'files' => collect(),
                ],

                'commits' => [],

                'branches' => [
                    'local' => [],
                    'remote' => [],
                ],

                'contributors' => [],

                'workingTree' => [
                    'clean' => false,
                    'files' => [],
                ],

                'repositoryHealth' => [
                    'score' => 0,
                    'repository_exists' => false,
                    'working_tree' => false,
                    'remote_connected' => false,
                    'branch_exists' => false,
                    'git_installed' => false,
                    'git_version' => null,
                ],

            ]);
        }

        $repositoryStatus = $this->gitShowInformation
            ->getRepositoryStatus($gitPath);

        $commits = $this->gitShowInformation
            ->loadLatestCommits($gitPath);

        $branches = $this->gitShowInformation
            ->loadBranches($gitPath);

        $contributors = $this->gitShowInformation
            ->loadContributors($gitPath);

        $workingTree = $this->gitShowInformation
            ->loadWorkingTree($gitPath);

        $repositoryHealth = $this->gitShowInformation
            ->loadRepositoryHealth(
                $gitPath,
                $repositoryStatus
            );

        return view('backend.git_page.show', compact(
            'project',
            'git',
            'repositoryStatus',
            'commits',
            'branches',
            'contributors',
            'workingTree',
            'repositoryHealth'
        ));
    }
}
