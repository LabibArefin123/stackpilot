<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectEnvironment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'commands' => function ($query) {
                $query->latest()->take(20);
            },
            'sessions',
        ]);

        $git = [
            'status' => 'Connected',          // Connected / Disconnected
            'branch' => 'main',
            'commits' => $project->commands()->where('command', 'like', '%git%')->count(),
            'health' => 95,
        ];

        $stats = [

            'total' => $project->commands()->count(),

            'success' => $project->commands()->where('success', 1)->count(),

            'failed' => $project->commands()->where('success', 0)->count(),

            'runtime' => number_format(
                $project->commands()->avg('execution_time') ?? 0,
                2
            )

        ];

        return view(
            'backend.project_page.show',
            compact(
                'project',
                'stats',
                'git'
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
