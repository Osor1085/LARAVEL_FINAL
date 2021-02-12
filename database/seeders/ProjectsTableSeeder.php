<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name'=>'Proyecto A',
            'description'=>'El proyecto A consiste en el desarrollo de  un sitio web responsive.'

        ]);

        Project::create([
            'name'=>'Proyecto B',
            'description'=>'El proyecto A consiste en el desarrollo de  una App android.'

        ]);
    }
}
