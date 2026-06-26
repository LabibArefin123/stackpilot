<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectEnvironment;
use Illuminate\Database\Seeder;

class ProjectEnvironmentSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::first();

        if (!$project) {
            return;
        }

        ProjectEnvironment::updateOrCreate(

            [

                'project_id' => $project->id,

            ],

            [

                'environment' => 'local',

                'project_path' => 'E:\\laragon\\www\\technotech_company',

                'public_path' => 'E:\\laragon\\www\\technotech_company\\public',

                'server_ip' => '127.0.0.1',

                'server_name' => 'Laragon',

                'hosting_provider' => 'Local Development',

                'php_version' => PHP_VERSION,

                'php_binary' => PHP_BINARY,

                'composer_binary' => 'composer',

                'node_version' => '20.x',

                'node_binary' => 'node',

                'npm_binary' => 'npm',

                'laravel_version' => app()->version(),

                'ssh_user' => null,

                'ssh_port' => 22,

                'last_checked_at' => now(),

                'is_default' => true,

            ]

        );
    }
}
