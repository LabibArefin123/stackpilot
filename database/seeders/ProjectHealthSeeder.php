<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectHealth;
use Illuminate\Database\Seeder;

class ProjectHealthSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::first();

        if (!$project) {
            return;
        }

        ProjectHealth::updateOrCreate(

            [

                'project_id' => $project->id,

            ],

            [

                'git_ok' => true,

                'composer_ok' => true,

                'node_ok' => true,

                'queue_ok' => false,

                'cron_ok' => false,

                'storage_link_ok' => true,

                'env_ok' => true,

                'health_score' => 90,

                'checked_at' => now(),

            ]

        );
    }
}
