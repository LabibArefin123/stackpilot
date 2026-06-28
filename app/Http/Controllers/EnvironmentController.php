<?php

namespace App\Http\Controllers;

use App\Models\ProjectEnvironment;
use App\Services\GitRepositoryScanner;

class EnvironmentController extends Controller
{
    public function __construct(
        protected GitRepositoryScanner $scanner
    ) {}

    public function index()
    {
        $environments = ProjectEnvironment::with('project')
            ->whereHas('project', function ($query) {
                $query->where('project_type', 'Laravel');
            })
            ->orderBy('environment')
            ->get();

        return view('backend.environment_page.index', [
            'environments' => $environments,
            'repositories' => $this->scanner->repositories(),
            'server' => [
                'php' => PHP_VERSION,
                'php_binary' => PHP_BINARY,
                'os' => PHP_OS_FAMILY,
                'hostname' => gethostname(),
                'repository_count' => count($this->scanner->repositories()),
            ],
        ]);
    }

    public function show(ProjectEnvironment $environment, GitRepositoryScanner $scanner)
    {
        $environment->load([
            'project',
            'project.health',
            'project.deployment',
        ]);

        $repository = $scanner->findRepository($environment->project);

        return view(
            'backend.environment_page.show',
            compact(
                'environment',
                'repository'
            )
        );
    }
}
