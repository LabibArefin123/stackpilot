<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectEnvironment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with([
            'environment',
            'health',
        ])
            ->latest()
            ->paginate(10);

        return view('backend.project_page.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.project_page.create');
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            // Project
            'name' => 'required|max:255',
            'domain' => 'required|max:255|unique:projects,domain',
            'git_repository' => 'nullable|max:255',
            'git_branch' => 'required|max:100',

            // Environment
            'environment' => 'required',
            'hosting_provider' => 'nullable|max:255',
            'project_path' => 'required|max:500',
            'public_path' => 'nullable|max:500',

            'server_name' => 'nullable|max:255',
            'server_ip' => 'nullable|max:100',

            'php_version' => 'nullable|max:50',
            'laravel_version' => 'nullable|max:50',

            'php_binary' => 'nullable|max:255',
            'composer_binary' => 'nullable|max:255',

            'node_version' => 'nullable|max:50',
            'node_binary' => 'nullable|max:255',
            'npm_binary' => 'nullable|max:255',

            'ssh_user' => 'nullable|max:255',
            'ssh_port' => 'nullable|integer',

        ]);

        DB::transaction(function () use ($validated) {

            $project = Project::create([

                'name' => $validated['name'],
                'domain' => $validated['domain'],
                'git_repository' => $validated['git_repository'],
                'git_branch' => $validated['git_branch'],
                'is_active' => true,
                'last_checked_at' => now(),

            ]);

            ProjectEnvironment::create([

                'project_id' => $project->id,

                'environment' => $validated['environment'],

                'hosting_provider' => $validated['hosting_provider'] ?? null,

                'project_path' => $validated['project_path'],

                'public_path' => $validated['public_path'] ?? null,

                'server_name' => $validated['server_name'] ?? null,

                'server_ip' => $validated['server_ip'] ?? null,

                'php_version' => $validated['php_version'] ?? null,

                'laravel_version' => $validated['laravel_version'] ?? null,

                'php_binary' => $validated['php_binary'] ?? '/usr/bin/php',

                'composer_binary' => $validated['composer_binary'] ?? '/usr/local/bin/composer',

                'node_version' => $validated['node_version'] ?? null,

                'node_binary' => $validated['node_binary'] ?? null,

                'npm_binary' => $validated['npm_binary'] ?? null,

                'ssh_user' => $validated['ssh_user'] ?? null,

                'ssh_port' => $validated['ssh_port'] ?? 22,

                'last_checked_at' => now(),

                'is_default' => true,

            ]);
        });

        return redirect()
            ->route('backend.project_page.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */


    public function show(Project $project)
    {
        $project->load([
            'environment',
            'health',
            'commands' => fn($q) => $q->latest()->take(20),
            'sessions',
        ]);

        $gitPath = $project->project_path ?: env('PROJECT_PATH');

        if (! is_dir($gitPath)) {
            abort(500, "Git project path not found: {$gitPath}");
        }

        $git = $this->loadGitInformation($project, $gitPath);

        $stats = $this->loadTerminalStatistics($project);

        $commits = $this->loadLatestCommits($gitPath);
        return view(
            'backend.project_page.show',
            compact(
                'project',
                'git',
                'stats',
                'commits'
            )
        );
    }

    private function runGitCommand($path, $command)
    {
        if (empty($path) || !is_dir($path)) {
            return null;
        }

        if (!is_dir($path . DIRECTORY_SEPARATOR . '.git')) {
            return null;
        }

        $process = Process::fromShellCommandline($command, $path);

        $process->setTimeout(30);

        $process->run();

        if (!$process->isSuccessful()) {
            return null;
        }

        return trim($process->getOutput());
    }

    private function loadGitInformation(Project $project, $gitPath)
    {
        $branch = $this->runGitCommand($gitPath, 'git branch --show-current');

        $lastHash = $this->runGitCommand($gitPath, 'git rev-parse --short HEAD');

        $lastMessage = $this->runGitCommand($gitPath, 'git log -1 --pretty=%s');

        $lastDate = $this->runGitCommand($gitPath, 'git log -1 --date=local --pretty=%cd');

        $gitVersion = $this->runGitCommand($gitPath, 'git --version');

        $branchCount = (int)$this->runGitCommand($gitPath, 'git branch --list | wc -l');

        $commitCount = (int)$this->runGitCommand($gitPath, 'git rev-list --count HEAD');

        $status = $this->runGitCommand($gitPath, 'git status --porcelain');

        $clean = empty($status);

        $localBranches = $this->runGitCommand($gitPath, 'git branch --format="%(refname:short)"');

        $remoteBranches = $this->runGitCommand($gitPath, 'git branch -r --format="%(refname:short)"');

        $remoteName = $this->runGitCommand($gitPath, 'git remote');

        $fetchUrl = $this->runGitCommand($gitPath, 'git remote get-url origin');

        $pushUrl = $this->runGitCommand($gitPath, 'git remote get-url --push origin');

        $defaultRemoteBranch = $this->runGitCommand(
            $gitPath,
            'git symbolic-ref refs/remotes/origin/HEAD'
        );

        $contributors = $this->runGitCommand(
            $gitPath,
            'git shortlog -sn'
        );

        $totalContributors = 0;

        if ($contributors) {

            $totalContributors = count(
                array_filter(
                    explode(PHP_EOL, $contributors)
                )
            );
        }

        $lastCommitAuthor = $this->runGitCommand(
            $gitPath,
            'git log -1 --pretty=%an'
        );

        $lastCommitEmail = $this->runGitCommand(
            $gitPath,
            'git log -1 --pretty=%ae'
        );
        return [

            'health' => $clean ? 100 : 80,

            'status' => $clean ? 'Clean' : 'Modified',

            'branch' => $branch,

            'commits' => $commitCount,

            'repository' => is_dir($gitPath . '/.git'),

            'remote' => filled($project->git_repository),

            'working_tree' => $clean,

            'branch_exists' => filled($branch),

            'latest_commit' => filled($lastHash),

            'connected' => filled($project->git_repository),

            'fetch_ok' => true,

            'push_access' => false,

            'repository_name' => basename($gitPath),

            'remote_url' => $project->git_repository,

            'last_hash' => $lastHash,

            'last_message' => $lastMessage,

            'last_date' => $lastDate,

            'git_version' => $gitVersion,

            'default_branch' => $branch,

            'branch_count' => $branchCount,

            'commit_count' => $commitCount,

            'local_branches' => collect(explode(PHP_EOL, $localBranches ?? ''))
                ->filter()
                ->values(),

            'remote_branches' => collect(explode(PHP_EOL, $remoteBranches ?? ''))
                ->filter()
                ->values(),

            'remote_name' => $remoteName ?: 'origin',

            'fetch_url' => $fetchUrl,

            'push_url' => $pushUrl,

            'default_remote_branch' => str_replace(
                'refs/remotes/origin/',
                '',
                $defaultRemoteBranch
            ),

            'total_contributors' => $totalContributors,

            'last_commit_author' => $lastCommitAuthor,

            'last_commit_email' => $lastCommitEmail,
        ];
    }

    private function loadTerminalStatistics(Project $project)
    {
        return [

            'total' => $project->commands()->count(),

            'success' => $project->commands()->where('success', 1)->count(),

            'failed' => $project->commands()->where('success', 0)->count(),

            'runtime' => number_format(

                $project->commands()->avg('execution_time') ?? 0,

                2

            )

        ];
    }

    private function loadLatestCommits($gitPath)
    {
        $commits = [];

        $process = Process::fromShellCommandline(

            'git log -10 --pretty=format:"%h|%an|%ad|%s" --date=relative',

            $gitPath

        );

        $process->run();

        if (!$process->isSuccessful()) {

            return [];
        }

        foreach (explode(PHP_EOL, $process->getOutput()) as $line) {

            if (trim($line) == '') continue;

            [$hash, $author, $date, $message] = explode('|', $line, 4);

            $commits[] = [

                'hash' => $hash,

                'author' => $author,

                'date' => $date,

                'message' => $message

            ];
        }

        return $commits;
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $project->load('environment');

        return view('backend.project_page.edit', compact('project'));
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([

            'name' => 'required|max:255',

            'domain' => 'required|max:255|unique:projects,domain,' . $project->id,

            'git_repository' => 'nullable|max:255',

            'git_branch' => 'required|max:100',

            'environment' => 'required',

            'hosting_provider' => 'nullable|max:255',

            'project_path' => 'required|max:500',

            'public_path' => 'nullable|max:500',

            'server_name' => 'nullable|max:255',

            'server_ip' => 'nullable|max:100',

            'php_version' => 'nullable|max:50',

            'laravel_version' => 'nullable|max:50',

            'php_binary' => 'nullable|max:255',

            'composer_binary' => 'nullable|max:255',

            'node_version' => 'nullable|max:50',

            'node_binary' => 'nullable|max:255',

            'npm_binary' => 'nullable|max:255',

            'ssh_user' => 'nullable|max:255',

            'ssh_port' => 'nullable|integer',

        ]);

        DB::transaction(function () use ($validated, $project) {

            $project->update([

                'name' => $validated['name'],

                'domain' => $validated['domain'],

                'git_repository' => $validated['git_repository'],

                'git_branch' => $validated['git_branch'],

            ]);

            $project->environment()->updateOrCreate(

                [
                    'project_id' => $project->id,
                ],

                [

                    'environment' => $validated['environment'],

                    'hosting_provider' => $validated['hosting_provider'] ?? null,

                    'project_path' => $validated['project_path'],

                    'public_path' => $validated['public_path'] ?? null,

                    'server_name' => $validated['server_name'] ?? null,

                    'server_ip' => $validated['server_ip'] ?? null,

                    'php_version' => $validated['php_version'] ?? null,

                    'laravel_version' => $validated['laravel_version'] ?? null,

                    'php_binary' => $validated['php_binary'] ?? '/usr/bin/php',

                    'composer_binary' => $validated['composer_binary'] ?? '/usr/local/bin/composer',

                    'node_version' => $validated['node_version'] ?? null,

                    'node_binary' => $validated['node_binary'] ?? null,

                    'npm_binary' => $validated['npm_binary'] ?? null,

                    'ssh_user' => $validated['ssh_user'] ?? null,

                    'ssh_port' => $validated['ssh_port'] ?? 22,

                    'last_checked_at' => now(),

                    'is_default' => true,

                ]

            );
        });

        return redirect()
            ->route('backend.project_page.show', $project)
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('backend.project_page.index')
            ->with('success', 'Project deleted successfully.');
    }
}
