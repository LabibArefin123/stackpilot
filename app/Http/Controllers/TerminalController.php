<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Process\Process;
use App\Models\LiveProject;

class TerminalController extends Controller
{
    /**
     * Local Projects Root
     */
    protected string $localRoot = 'E:\\laragon\\www';

    /**
     * Display Terminal Page
     */
    public function index()
    {
        $projects = LiveProject::orderBy('project_name')->get();

        return view('backend.terminal_page.index', compact('projects'));
    }

    /**
     * Get Local & Live Projects
     */
    public function projects()
    {
        $localProjects = [];

        if (File::exists($this->localRoot)) {

            foreach (File::directories($this->localRoot) as $dir) {

                $localProjects[] = [
                    'name' => basename($dir),
                    'path' => $dir,
                ];
            }
        }

        return response()->json([
            'success' => true,
            'local_projects' => $localProjects,
            'live_projects' => LiveProject::orderBy('project_name')->get(),
        ]);
    }

    /**
     * Create New Folder
     */
    public function createFolder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'folder_name' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z0-9_-]+$/'
            ]
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $folder = $this->localRoot . DIRECTORY_SEPARATOR . $request->folder_name;

        if (File::exists($folder)) {

            return response()->json([
                'success' => false,
                'message' => 'Folder already exists.'
            ]);
        }

        File::makeDirectory($folder, 0755, true);

        return response()->json([
            'success' => true,
            'message' => 'Folder created successfully.',
            'path' => $folder
        ]);
    }

    /**
     * Detect Installed PHP Versions
     */
    public function detectPHP()
    {
        $versions = [];

        $possible = [

            'C:\\laragon\\bin\\php',
            'E:\\laragon\\bin\\php',
            'C:\\xampp\\php',
            'C:\\php',
            'E:\\php',

        ];

        foreach ($possible as $path) {

            if (!File::exists($path)) {
                continue;
            }

            foreach (File::directories($path) as $dir) {

                $php = $dir . DIRECTORY_SEPARATOR . 'php.exe';

                if (!File::exists($php)) {
                    continue;
                }

                $versions[] = [
                    'version' => basename($dir),
                    'path' => $php,
                ];
            }
        }

        return response()->json([
            'success' => true,
            'php_versions' => $versions
        ]);
    }

    /**
     * Detect Installed Node Versions
     */
    public function detectNode()
    {
        $locations = [
            'C:\\Users\\hp\\.config\\herd\\bin\\composer.bat',
            'E:\\xampp\\composer.bat',
            'E:\\xampp\\composer',
        ];

        $nodes = [];

        foreach ($locations as $location) {

            if (File::exists($location)) {

                $nodes[] = [
                    'name' => 'NodeJS',
                    'path' => $location
                ];
            }
        }

        return response()->json([
            'success' => true,
            'node_versions' => $nodes
        ]);
    }

    /**
     * Detect Installed Git
     */
    public function detectGit()
    {
        $locations = [

            'C:\\Program Files\\Git\\cmd\\git.exe',
            'C:\\Program Files\\Git\\bin\\git.exe',
            'C:\\Program Files (x86)\\Git\\cmd\\git.exe',
            'E:\\Git\\cmd\\git.exe',

        ];

        $git = null;

        foreach ($locations as $location) {

            if (File::exists($location)) {

                $process = new Process([$location, '--version']);

                $process->run();

                $version = 'Unknown';

                if ($process->isSuccessful()) {

                    $version = trim($process->getOutput());
                }

                $git = [

                    'name'    => 'Git',

                    'path'    => $location,

                    'version' => $version,

                ];

                break;
            }
        }

        return response()->json([

            'success' => $git !== null,

            'git' => $git,

        ]);
    }

    /**
     * Check Live Server Status
     */
    public function serverStatus(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:live_projects,id',
        ]);

        $project = LiveProject::findOrFail($request->project_id);

        $url = rtrim($project->domain, '/') . '/' . ltrim($project->api_name, '/');

        try {

            $response = Http::acceptJson()
                ->timeout(15)
                ->retry(2, 500)
                ->get($url);

            if (!$response->successful()) {

                return response()->json([

                    'success' => false,

                    'project' => $project->project_name,

                    'url' => $url,

                    'status' => $response->status(),

                    'message' => 'Remote server returned HTTP ' . $response->status(),

                ]);
            }

            $data = $response->json();

            return response()->json([

                'success' => true,

                'project' => $project->project_name,

                'url' => $url,

                'status' => $response->status(),

                'online' => true,

                'data' => $data,

            ]);
        } catch (\Throwable $e) {

            return response()->json([

                'success' => false,

                'project' => $project->project_name,

                'url' => $url,

                'online' => false,

                'message' => $e->getMessage(),

            ], 500);
        }
    }

    protected array $allowedCommands = [

        'composer_install' => 'composer install',
        'composer_update' => 'composer update',
        'composer_dump' => 'composer dump-autoload',

        'artisan_optimize' => 'php artisan optimize',
        'artisan_optimize_clear' => 'php artisan optimize:clear',
        'artisan_migrate' => 'php artisan migrate',
        'artisan_seed' => 'php artisan db:seed',
        'artisan_storage' => 'php artisan storage:link',
        'artisan_route_cache' => 'php artisan route:cache',
        'artisan_config_cache' => 'php artisan config:cache',
        'artisan_view_cache' => 'php artisan view:cache',

        'npm_install' => 'npm install',
        'npm_update' => 'npm update',
        'npm_dev' => 'npm run dev',
        'npm_build' => 'npm run build',

        'git_status' => 'git status',
        'git_pull' => 'git pull',
    ];
}
