<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//model
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
//helper
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });

        for ($i=0; $i < 20; $i++) { 
            $rendomType = Type::inRandomOrder()->first();
            
            Project::create([
                'title'=> substr(fake()->sentence(3),0,100),
                'preview'=> fake()->imageUrl(400, 300),
                'collaborators'=>substr(fake()->sentence(3),0,255),
                'description'=> fake()->paragraph(),
                'type_id'=> $rendomType->id,
            ]);

        }
    }
}
