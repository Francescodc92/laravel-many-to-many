<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//models
use App\Models\Type;
//helper
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Schema::withoutForeignKeyConstraints(function () {
        Type::truncate();
      });


      $types = [
        'front-end',
        'back-end',
        'boolean-project',
        'personal-project'
      ];
        
        foreach ($types as $type) {
          Type::create([
            'title'=> $type,
            'description'=> fake()->paragraph(),
          ]);
        }
    }
}
