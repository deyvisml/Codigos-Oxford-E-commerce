<?php

namespace Database\Seeders;

use App\Models\SchoolLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SchoolLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 60; $i++) {
            SchoolLevel::create([
                'name' => $faker->word(),
                'school_id' => $faker->numberBetween(1, 25),
            ]);
        }
    }
}
