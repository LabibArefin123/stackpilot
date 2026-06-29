<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectEnvironment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use App\Services\GitRepositoryScanner;
use App\Services\ProjectControllerService;
use Illuminate\Support\Facades\Cache;

class ProjectController extends Controller
{
    public function __construct(
        protected GitRepositoryScanner $scanner,
        protected ProjectControllerService $projectService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with([
            'environment:id,project_id,php_version,laravel_version,environment',
            'health:id,project_id,health_score',
        ])
            ->where('project_type', 'Laravel')
            ->orderBy('name')
            ->get();

        foreach ($projects as $project) {

            $project->git = Cache::remember(
                'repository_stats_' . $project->id,
                now()->addMinutes(5),
                function () use ($project) {
                    return $this->scanner->repositoryStatistics($project);
                }
            );
        }

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
            'name'              => 'required|string|max:255',
            'domain' => 'required|string|max:255|unique:projects,domain',
            'project_type'      => 'nullable|string|max:100',
            'git_repository'    => 'nullable|string|max:255',
            'git_branch'        => 'nullable|string|max:100',
            'default_branch'    => 'nullable|string|max:100',
            'git_status'        => 'nullable|string|max:100',
            'last_commit'       => 'nullable|string',
            'last_commit_date'  => 'nullable|date',
            'owner'             => 'nullable|string|max:255',
            'visibility'        => 'nullable|string|max:100',
            'is_private' => 'sometimes|boolean',
            'is_active'  => 'sometimes|boolean',

            // Environment
            'environment'       => 'required|string|max:100',
            'hosting_provider'  => 'nullable|string|max:255',
            'project_path'      => 'nullable|string|max:500',
            'public_path'       => 'nullable|string|max:500',
            'server_name'       => 'nullable|string|max:255',
            'server_ip'         => 'nullable|string|max:100',
            'php_version'       => 'nullable|string|max:50',
            'laravel_version'   => 'nullable|string|max:50',
            'php_binary'        => 'nullable|string|max:255',
            'composer_binary'   => 'nullable|string|max:255',
            'node_version'      => 'nullable|string|max:50',
            'node_binary'       => 'nullable|string|max:255',
            'npm_binary'        => 'nullable|string|max:255',
            'ssh_user'          => 'nullable|string|max:255',
            'ssh_port'          => 'nullable|integer',

        ]);

        DB::transaction(function () use ($validated, $request) {
            $project = Project::create([
                'name'             => $validated['name'],
                'domain'           => $validated['domain'],
                'project_type'     => $validated['project_type'] ?? null,
                'git_repository'   => $validated['git_repository'] ?? null,
                'git_branch'       => $validated['git_branch'] ?? null,
                'default_branch'   => $validated['default_branch'] ?? 'main',
                'git_status'       => $validated['git_status'] ?? 'Unknown',
                'last_commit'      => $validated['last_commit'] ?? null,
                'last_commit_date' => $validated['last_commit_date'] ?? null,
                'owner'            => $validated['owner'] ?? null,
                'visibility'       => $validated['visibility'] ?? 'Private',
                'is_private'       => $request->boolean('is_private'),
                'is_active'        => $request->boolean('is_active'),
                'last_checked_at'  => now(),
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
            'deployment',
            'commands' => fn($query) => $query->latest()->take(20),
            'sessions',
        ]);

        $gitPath = $this->scanner->findRepository($project);

        if (!$gitPath) {
            abort(404, "Repository not found for {$project->name}");
        }

        $git = $this->projectService->loadGitInformation($project, $gitPath);
        $deployment = $this->projectService->loadDeployment($project, $git);
        $stats = $this->projectService->loadTerminalStatistics($project);
        $commits = $this->projectService->loadLatestCommits($gitPath);

        return view(
            'backend.project_page.show',
            compact(
                'project',
                'git',
                'deployment',
                'stats',
                'commits'
            )
        );
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

        DB::transaction(function () use ($validated, $project, $request) {
            $project->update([
                'name'             => $validated['name'],
                'domain'           => $validated['domain'],
                'project_type'     => $validated['project_type'] ?? null,
                'git_repository'   => $validated['git_repository'] ?? null,
                'git_branch'       => $validated['git_branch'] ?? null,
                'default_branch'   => $validated['default_branch'] ?? 'main',
                'git_status'       => $validated['git_status'] ?? 'Unknown',
                'last_commit'      => $validated['last_commit'] ?? null,
                'last_commit_date' => $validated['last_commit_date'] ?? null,
                'owner'            => $validated['owner'] ?? null,
                'visibility'       => $validated['visibility'] ?? 'Private',
                'is_private'       => $request->boolean('is_private'),
                'is_active'        => $request->boolean('is_active'),
                'last_checked_at'  => now(),
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

    private function buildRepositoryTimeline($commits)
    {
        return collect($commits)
            ->groupBy('date')
            ->sortKeysDesc()
            ->map(function ($items, $date) {
                return [
                    'date'     => $date,
                    'total'    => $items->count(),
                    'added'    => $items->sum('added'),
                    'deleted'  => $items->sum('deleted'),
                    'commits'  => $items->values(),
                ];
            })
            ->values();
    }

    public function projectRepository(Project $project)
    {
        $gitPath = $this->scanner->findRepository($project);

        abort_if(!$gitPath, 404, 'Repository not found.');

        $today = now()->format('Y-m-d');

        $commits = collect(
            $this->scanner->repositoryCommits($gitPath)
        )->where('date', $today);

        $timeline = $commits
            ->groupBy('date')
            ->sortKeysDesc()
            ->map(function ($items, $date) {
                return [
                    'date' => $date,
                    'total' => $items->count(),
                    'added' => $items->sum('added'),
                    'deleted' => $items->sum('deleted'),
                    'commits' => $items->values()->all(),
                ];
            })
            ->values();

        return view(
            'backend.project_page.repository',
            compact('project', 'timeline')
        );
    }

    public function repositorySearch(Request $request, Project $project)
    {
        $gitPath = $this->scanner->findRepository($project);

        abort_if(!$gitPath, 404);

        $keyword = strtolower(trim($request->keyword));

        $commits = collect(
            $this->scanner->repositoryCommits($gitPath)
        );

        if ($keyword !== '') {
            $commits = $commits->filter(function ($commit) use ($keyword) {
                return
                    str_contains(strtolower($commit['message']), $keyword) ||
                    str_contains(strtolower($commit['author']), $keyword) ||
                    str_contains(strtolower($commit['short_hash']), $keyword);
            });
        }

        return response()->json([
            'success' => true,
            'data' => $this->buildRepositoryTimeline($commits),
        ]);
    }


    public function repositoryTimeline(Project $project)
    {
        $gitPath = $this->scanner->findRepository($project);

        abort_if(!$gitPath, 404);

        return response()->json([
            'success' => true,
            'data' => $this->buildRepositoryTimeline(
                $this->scanner->repositoryCommits($gitPath)
            ),
        ]);
    }

    public function repositoryFilter(Request $request, Project $project)
    {
        $gitPath = $this->scanner->findRepository($project);

        abort_if(!$gitPath, 404);

        $commits = collect(
            $this->scanner->repositoryCommits($gitPath)
        );

        if ($request->filled('author')) {
            $commits = $commits->where('author', $request->author);
        }

        if ($request->filled('date')) {
            $commits = $commits->where('date', $request->date);
        }

        return response()->json([
            'success' => true,
            'data' => $this->buildRepositoryTimeline($commits),
        ]);
    }

    public function repositoryCommit(Project $project, string $hash)
    {
        $gitPath = $this->scanner->findRepository($project);

        abort_if(!$gitPath, 404);

        $commit = collect(
            $this->scanner->repositoryCommits($gitPath)
        )->firstWhere('hash', $hash);

        if (!$commit) {
            return response()->json([
                'success' => false,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $commit,
        ]);
    }

    public function repositoryHash(Project $project, string $hash)
    {
        return response()->json([
            'success' => true,
            'hash' => $hash,
        ]);
    }

    public function projectInstall()
    {
        $projects = Project::with([
            'environment',
            'health'
        ])->where('project_type', 'Laravel')
            ->orderBy('name')->get();
        return view('backend.project_page.project_install.index', compact('projects'));
    }
}
