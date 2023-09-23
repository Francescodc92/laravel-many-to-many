<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//models
use App\Models\Technology;
//helper
use Illuminate\Support\Facades\Schema;
 
class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
         Technology::truncate();
        Schema::enableForeignKeyConstraints();

        $technologies = [
            'HTML',
            'CSS',
            'JAVASCRIPT',
            'BOOTSTRAP',
            'TAILWIND',
            'VUE',
            'SASS',
            'PHP',
            'LARAVEL',
        ];
        
        foreach ($technologies as $technology) {
            Technology::create([
                'title'=> $technology,
                'description'=> fake()->paragraph(),
            ]);
        }
    }
}
