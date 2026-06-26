<?php

namespace Database\Seeders;

use App\Models\Deployment;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DeploymentSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::first();

        if (!$project) {
            return;
        }

        Deployment::updateOrCreate(

            [

                'project_id' => $project->id,

            ],

            [

                'status' => 'success',

                'method' => 'Git Pull',

                'server' => 'Laragon Localhost',

                'version' => '1.0.0',

                'release_version' => 'v1.0.0',

                'build_number' => '1001',

                'build_duration' => '18 Seconds',

                'artifact_name' => 'technotech_company.zip',

                'git_pull_command' => 'git pull origin main',

                'composer_install_command' => 'composer install',

                'npm_build_command' => 'npm run build',

                'migration_command' => 'php artisan migrate',

                'cache_clear_command' => 'php artisan optimize:clear',

                'success_count' => 1,

                'failed_count' => 0,

                'deployed_at' => now(),

            ]

        );
    }
}
