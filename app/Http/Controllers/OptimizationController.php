<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\File;
use App\Models\Project;
use App\Models\HostingAccount;

class OptimizationController extends Controller
{
    public function index()
    {
        $projects = [];
        $laragonPath = 'E:\\laragon\www';

        if (File::exists($laragonPath)) {
            $directories = File::directories($laragonPath);
            foreach ($directories as $directory) {
                if (File::exists($directory . DIRECTORY_SEPARATOR . 'artisan')) {
                    $composer = $directory . DIRECTORY_SEPARATOR . 'composer.json';
                    $branch = '-';
                    if (File::exists($directory . DIRECTORY_SEPARATOR . '.git')) {
                        $branch = trim(
                            @shell_exec(
                                'git -C "' . $directory . '" branch --show-current'
                            )
                        ) ?: 'Unknown';
                    }

                    $domain = 'Local Development';

                    if (File::exists($composer)) {
                        $composerData = json_decode(
                            File::get($composer),
                            true
                        );

                        if (!empty($composerData['name'])) {
                            $domain = $composerData['name'];
                        }
                    }

                    $projects[] = (object) [
                        'id' => md5($directory),
                        'name' => basename($directory),
                        'domain' => $domain,
                        'git_branch' => $branch,
                        'project_path' => $directory,
                        'health' => (object) [
                            'health_score' => 100
                        ]

                    ];
                }
            }
        }

        usort($projects, function ($a, $b) {
            return strcmp($a->name, $b->name);
        });

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

    public function liveOptimize(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $domain = trim($project->domain);
        $result = [
            'success' => true,
            'domain' => $domain,
            'hosting_provider' => 'Unknown',
            'hosting_account' => 'Not Detected',
            'server_status' => 'Offline',
            'php_version' => 'Unknown',
        ];

        /* Check DNS*/
        $ip = gethostbyname($domain);
        if ($ip !== $domain) {
            $result['server_status'] = 'Online';
        }

        /* Check Website  */
        try {
            $headers = @get_headers("https://{$domain}");
            if (!$headers) {
                $headers = @get_headers("http://{$domain}");
            }

            if ($headers) {
                foreach ($headers as $header) {
                    if (stripos($header, 'Server:') !== false) {
                        $result['hosting_provider'] = trim(
                            str_replace('Server:', '', $header)
                        );
                    }

                    if (stripos($header, 'X-Powered-By: PHP/') !== false) {
                        $result['php_version'] = trim(
                            str_replace('X-Powered-By:', '', $header)
                        );
                    }
                }
            }
        } catch (\Exception $e) {
            //
        }

        return response()->json($result);
    }

    public function liveHostingForm(Request $request)
    {
        $request->validate([
            'name'                 => 'required|max:255',
            'provider'             => 'required|max:255',
            'host'                 => 'required|max:255',
            'port'                 => 'required|integer',
            'username'             => 'required|max:255',
            'private_key_path'     => 'required|max:255',
            'default_project_path' => 'required|max:255',
            'description'          => 'nullable|max:1000',
        ]);

        HostingAccount::create([
            'name'                 => $request->name,
            'provider'             => $request->provider,
            'host'                 => $request->host,
            'port'                 => $request->port,
            'username'             => $request->username,
            'private_key_path'     => $request->private_key_path,
            'default_project_path' => $request->default_project_path,
            'description'          => $request->description,
            'is_active'            => $request->has('is_active')

        ]);

        return response()->json([
            'success' => true,
            'message' => 'Hosting account created successfully.'
        ]);
    }
}
