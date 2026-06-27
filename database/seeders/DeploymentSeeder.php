<?php

namespace Database\Seeders;

use App\Models\Deployment;
use App\Models\Project;
use App\Services\GitRepositoryScanner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class DeploymentSeeder extends Seeder
{
    public function run(): void
    {
        $scanner = app(GitRepositoryScanner::class);

        Project::all()->each(function (Project $project) use ($scanner) {

            $projectPath = $scanner->findRepository($project);

            if (!$projectPath) {
                return;
            }

            $branch = $scanner->command(
                $projectPath,
                'git branch --show-current'
            );

            $commit = $scanner->command(
                $projectPath,
                'git rev-parse --short HEAD'
            );

            $artifact = basename($projectPath) . '.zip';

            Deployment::updateOrCreate(

                [
                    'project_id' => $project->id,
                ],

                [

                    'status' => 'success',

                    'method' => 'Git Pull',

                    'server' => optional($project->environment)->server_name
                        ?? gethostname(),

                    'version' => $this->projectVersion($projectPath),

                    'release_version' => 'v' . ($this->projectVersion($projectPath) ?? '1.0.0'),

                    'build_number' => now()->format('YmdHis'),

                    'build_duration' => null,

                    'artifact_name' => $artifact,

                    'git_pull_command' => 'git pull origin ' . ($branch ?: 'main'),

                    'composer_install_command' => File::exists($projectPath . DIRECTORY_SEPARATOR . 'composer.json')
                        ? 'composer install --no-dev --optimize-autoloader'
                        : null,

                    'npm_build_command' => File::exists($projectPath . DIRECTORY_SEPARATOR . 'package.json')
                        ? 'npm run build'
                        : null,

                    'migration_command' => File::exists($projectPath . DIRECTORY_SEPARATOR . 'artisan')
                        ? 'php artisan migrate --force'
                        : null,

                    'cache_clear_command' => File::exists($projectPath . DIRECTORY_SEPARATOR . 'artisan')
                        ? 'php artisan optimize'
                        : null,

                    'success_count' => 1,

                    'failed_count' => 0,

                    'deployed_at' => now(),

                ]

            );
        });
    }

    /**
     * Read project version from composer.json.
     */
    protected function projectVersion(string $path): ?string
    {
        $composer = $path . DIRECTORY_SEPARATOR . 'composer.json';

        if (!File::exists($composer)) {
            return null;
        }

        $json = json_decode(File::get($composer), true);

        return $json['version'] ?? null;
    }
}
