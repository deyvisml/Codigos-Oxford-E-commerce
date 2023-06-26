<?php

namespace Database\Seeders;

use App\Models\ProductSchoolLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSchoolLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            ProductSchoolLevel::create([
                'product_id' => $faker->numberBetween(1, 200),
                'school_level_id' => $faker->numberBetween(1, 25),
            ]);
        }
    }
}
