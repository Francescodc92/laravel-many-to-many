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
        
        for ($i=0; $i < 10; $i++) { 
            Technology::create([
             'title'=> substr(fake()->word(),0,64),
             'description'=> fake()->paragraph(),
           ]);
        }
    }
}
