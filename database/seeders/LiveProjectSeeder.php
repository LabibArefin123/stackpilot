<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LiveProject;

class LiveProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [

            [
                'project_name' => 'Alamgir Art',
                'domain'       => 'https://alamgirart.labib.work',
                'api_name'     => '/api/system/logs',
            ],

            [
                'project_name' => 'Asif Almas Haque',
                'domain'       => 'https://asifalmashaque.labib.work',
                'api_name'     => '/api/system/logs',
            ],

            [
                'project_name' => 'Fazlul Haque Hospital',
                'domain'       => 'https://fazlulhaquehospital.labib.work',
                'api_name'     => '/api/system/logs',
            ],

            [
                'project_name' => 'Labib Main Website',
                'domain'       => 'https://labib.work',
                'api_name'     => '/api/system/logs',
            ],

            [
                'project_name' => 'Munna SHMC',
                'domain'       => 'https://munnashmc.labib.work',
                'api_name'     => '/api/system/logs',
            ],

            [
                'project_name' => 'Technotech Engineering Ltd',
                'domain'       => 'https://technotechengineeringltd.labib.work',
                'api_name'     => '/api/system/logs',
            ],

        ];

        foreach ($projects as $project) {

            LiveProject::updateOrCreate(

                [
                    'domain' => $project['domain'],
                ],

                $project

            );
        }
    }
}
