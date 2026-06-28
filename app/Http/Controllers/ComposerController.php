<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\GitRepositoryScanner;
use Illuminate\Http\Request;

class ComposerController extends Controller
{
    public function __construct(
        protected GitRepositoryScanner $scanner
    ) {}

    /**
     * Composer Dashboard
     */
    public function index()
    {
        $projects = Project::orderBy('name')->get();

        foreach ($projects as $project) {

            $path = $this->scanner->findRepository($project);

            if (!$path) {
                continue;
            }

            $project->composer = [

                'version' => $this->scanner->composerVersion(),

                'json' => $this->scanner->composerJson($path),

                'packages' => $this->scanner->composerPackages($path),

                'package_count' => count(
                    $this->scanner->composerPackages($path)
                ),

                'lock' => $this->scanner->composerLockExists($path),

                'vendor' => $this->scanner->vendorExists($path),

                'autoload' => $this->scanner->autoloadExists($path),

                'php' => $this->scanner->phpVersion($path),

                'laravel' => $this->scanner->laravelVersion($path),

            ];
        }

        return view(
            'backend.composer_page.index',
            compact('projects')
        );
    }

    /**
     * Ajax
     * Return composer.json
     */
    public function show(Project $project)
    {
        $path = $this->scanner->findRepository($project);

        abort_if(!$path, 404);

        return response()->json(
            $this->scanner->composerJson($path)
        );
    }

    /**
     * Ajax
     */
    public function packages(Project $project)
    {
        $path = $this->scanner->findRepository($project);

        abort_if(!$path, 404);

        return response()->json(
            $this->scanner->composerPackages($path)
        );
    }

    /**
     * Ajax Terminal
     */
    public function terminal(Request $request, Project $project)
    {
        $request->validate([

            'command' => 'required|string'

        ]);

        $path = $this->scanner->findRepository($project);

        abort_if(!$path, 404);

        return response()->json([

            'output' => $this->scanner->command(
                $path,
                'composer ' . $request->command
            )

        ]);
    }
}
