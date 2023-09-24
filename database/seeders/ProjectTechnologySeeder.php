<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
//models
use App\Models\Project;
use App\Models\Technology;


class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=0; $i < 30; $i++) { 
            $rendomProject = Project::inRandomOrder()->first();
            $rendomTechnology = Technology::inRandomOrder()->first();
            
            $rendomProject->technologies()->attach($rendomTechnology);

        }
       
    }
}
