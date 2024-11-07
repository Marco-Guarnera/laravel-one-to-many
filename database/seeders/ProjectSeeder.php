<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker) : void {
        for ($i = 0; $i < 25; $i++) {
            $project = new Project();
            $project->name = $faker->unique()->word();
            $project->description = $faker->text(250);
            $project->save();
        }
    }
}
