<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectEnvironment;
use Illuminate\Database\Seeder;

class ProjectEnvironmentSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::where(
            'domain',
            'technotechengineeringltd.labib.work'
        )->first();

        if (!$project) {
            return;
        }

        ProjectEnvironment::updateOrCreate(

            [

                'project_id' => $project->id,

            ],

            [

                'environment' => 'production',

                'project_path' => '/home/labibwor/technotech_engineering_ltd',

                'public_path' => '/home/labibwor/technotech_engineering_ltd/public',

                'server_ip' => 'Unknown',

                'server_name' => 'DianaHost Shared Hosting',

                'hosting_provider' => 'DianaHost',

                'php_version' => '8.2',

                'php_binary' => '/usr/bin/php',

                'composer_binary' => '/usr/local/bin/composer',

                'node_version' => 'Unknown',

                'node_binary' => '/usr/bin/node',

                'npm_binary' => '/usr/bin/npm',

                'laravel_version' => '11.31',

                'ssh_user' => null,

                'ssh_port' => 22,

                'last_checked_at' => now(),

                'is_default' => true,

            ]

        );
    }
}
