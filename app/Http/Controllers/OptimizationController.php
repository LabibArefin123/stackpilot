<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use App\Models\Project;

class OptimizationController extends Controller
{
    public function index()
    {
        $projects = Project::with('health')
            ->where('project_type', 'Laravel')
            ->orderBy('name')
            ->get();

        $commands = [

            [
                'title' => 'Optimize',
                'description' => 'Build all Laravel caches.',
                'command' => 'optimize',
                'artisan' => 'php artisan optimize',
                'icon' => 'fas fa-bolt',
                'color' => 'success',
            ],

            [
                'title' => 'Optimize Clear',
                'description' => 'Clear every cache.',
                'command' => 'optimize:clear',
                'artisan' => 'php artisan optimize:clear',
                'icon' => 'fas fa-trash',
                'color' => 'danger',
            ],

            [
                'title' => 'Config Cache',
                'description' => 'Cache configuration files.',
                'command' => 'config:cache',
                'artisan' => 'php artisan config:cache',
                'icon' => 'fas fa-cogs',
                'color' => 'primary',
            ],

            [
                'title' => 'Route Cache',
                'description' => 'Cache application routes.',
                'command' => 'route:cache',
                'artisan' => 'php artisan route:cache',
                'icon' => 'fas fa-route',
                'color' => 'info',
            ],

            [
                'title' => 'View Cache',
                'description' => 'Compile Blade templates.',
                'command' => 'view:cache',
                'artisan' => 'php artisan view:cache',
                'icon' => 'fas fa-eye',
                'color' => 'warning',
            ],

            [
                'title' => 'Event Cache',
                'description' => 'Cache Laravel events.',
                'command' => 'event:cache',
                'artisan' => 'php artisan event:cache',
                'icon' => 'fas fa-broadcast-tower',
                'color' => 'secondary',
            ],

        ];

        return view(
            'backend.optimize_page.index',
            compact(
                'commands',
                'projects'
            )
        );
    }

    public function localOptimize(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $phpVersions = [];
        $environments = [];

        /* Detect Laragon*/
        if (is_dir('E:\\laragon')) {
            $environments[] = 'Laragon';
            if (is_dir('E:\\laragon\\bin\\php')) {
                foreach (glob('E:\\laragon\\bin\\php\\*') as $php) {
                    $phpVersions[] = basename($php);
                }
            }
        }

        /* Detect Laravel Herd*/
        if (is_dir('C:\\Users\\' . getenv('USERNAME') . '\\.config\\herd')) {
            $environments[] = 'Laravel Herd';
        }

        /*Detect XAMPP*/
        if (is_dir('C:\\xampp')) {
            $environments[] = 'XAMPP';
        }

        /* Detect WAMP*/
        if (is_dir('C:\\wamp64')) {
            $environments[] = 'WAMP';
        }

        return response()->json([
            'success' => true,
            'environment' => $environments,
            'php_versions' => $phpVersions,
            'project_path' => $project->project_path,
            'artisan' => file_exists($project->project_path . '/artisan')
        ]);
    }

    public function run(Request $request)
    {
        $request->validate([

            'command' => 'required|string',

        ]);

        $allowed = [

            'optimize',

            'optimize:clear',

            'config:cache',

            'config:clear',

            'route:cache',

            'route:clear',

            'view:cache',

            'view:clear',

            'event:cache',

            'event:clear',

        ];

        if (! in_array($request->command, $allowed)) {

            return response()->json([

                'success' => false,

                'output' => 'Command not allowed.'

            ], 403);
        }

        $process = Process::fromShellCommandline(

            'php artisan ' . $request->command,

            base_path()

        );

        $process->setTimeout(120);

        $process->run();

        return response()->json([

            'success' => $process->isSuccessful(),

            'output' => $process->getOutput() ?: $process->getErrorOutput(),

        ]);
    }
}
