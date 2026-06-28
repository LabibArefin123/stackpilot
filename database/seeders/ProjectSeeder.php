<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::updateOrCreate(

            [
                'domain' => 'technotechengineeringltd.labib.work',
            ],

            [
                'name' => 'TechnoTech Engineering Ltd',
                'domain' => 'technotechengineeringltd.labib.work',
                'git_branch' => 'main',
                'git_repository' => 'https://github.com/LabibArefin123/TechnoTech_company.git',
                'is_active' => true,
                'last_checked_at' => now(),
            ]

        );
    }
}
