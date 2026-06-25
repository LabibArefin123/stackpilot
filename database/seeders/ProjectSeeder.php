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
                'name'             => 'TechnoTech Engineering Ltd',
                'domain'           => 'technotechengineeringltd.labib.work',

                // Project root path (recommended)
                'project_path'     => '/home/labibwor/technotech_engineering_ltd',

                'php_version'      => '8.2',
                'laravel_version'  => '11.31',

                'git_branch'       => 'main',

                'git_repository'   => 'https://github.com/LabibArefin123/TechnoTech_company.git',

                'server_ip'        => null,

                'is_active'        => true,

                'last_checked_at'  => now(),
            ]
        );
    }
}
