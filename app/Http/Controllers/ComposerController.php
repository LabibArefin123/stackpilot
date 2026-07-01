<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\GitRepositoryScanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ComposerController extends Controller
{
    public function __construct(
        protected GitRepositoryScanner $scanner
    ) {}

    /**
     * Composer Dashboard
     */

    private function getProjects()
    {
        $projects = [];
        $laragonPath = 'E:\\laragon\\www';

        if (!File::exists($laragonPath)) {
            return collect();
        }

        foreach (File::directories($laragonPath) as $directory) {

            if (!File::exists($directory . DIRECTORY_SEPARATOR . 'artisan')) {
                continue;
            }

            $packages = $this->scanner->composerPackages($directory);

            $projects[] = (object) [

                'id' => md5($directory),

                'name' => basename($directory),

                'project_path' => $directory,

                'composer' => [

                    'version' => $this->scanner->composerVersion(),

                    'json' => $this->scanner->composerJson($directory),

                    'packages' => $packages,

                    'package_count' => count($packages),

                    'lock' => $this->scanner->composerLockExists($directory),

                    'vendor' => $this->scanner->vendorExists($directory),

                    'autoload' => $this->scanner->autoloadExists($directory),

                    'php' => $this->scanner->phpVersion($directory),

                    'laravel' => $this->scanner->laravelVersion($directory),

                ],

            ];
        }

        usort($projects, fn($a, $b) => strcmp($a->name, $b->name));

        return collect($projects);
    }

    public function index()
    {
        $projects = $this->getProjects();

        return view(
            'backend.composer_page.index',
            compact('projects')
        );
    }
    /**
     * Ajax
     * Return composer.json
     */
    public function show(Request $request)
    {
        $request->validate([
            'project_path' => 'required|string',
        ]);

        $path = $request->project_path;

        abort_if(
            !File::exists($path . DIRECTORY_SEPARATOR . 'composer.json'),
            404,
            'composer.json not found.'
        );

        return response()->json(
            $this->scanner->composerJson($path)
        );
    }

    /**
     * Ajax
     */
    public function packages(Request $request)
    {
        $request->validate([
            'project_path' => 'required|string',
        ]);

        $path = $request->project_path;

        abort_if(
            !File::exists($path . DIRECTORY_SEPARATOR . 'composer.json'),
            404,
            'composer.json not found.'
        );

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

        $output = $this->scanner->command(
            $path,
            'composer --no-ansi --no-interaction ' . $request->command
        );

        // Remove ANSI color codes
        $output = preg_replace('/\x1B\[[0-9;]*[A-Za-z]/', '', $output);

        // Remove OSC 8 hyperlinks
        $output = preg_replace('/\x1B\].*?\x07/', '', $output);
        $output = preg_replace('/\x1B\].*?\x1B\\\\/', '', $output);

        return response()->json([
            'output' => trim($output)
        ]);
    }

    public function installedPackages()
    {
        $projects = $this->getProjects();

        return view(
            'backend.composer_page.installed_packages',
            compact('projects')
        );
    }

    public function terminalPage()
    {
        $projects = $this->getProjects();

        return view(
            'backend.composer_page.terminal',
            compact('projects')
        );
    }
}
