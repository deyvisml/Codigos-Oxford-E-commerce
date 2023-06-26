<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 200; $i++) {
            Product::create([
                'name' => $faker->sentence(),
                'isbn'  => (string) $faker->numberBetween(111111111, 999999999) . "",
                'isbn2'  => (string) $faker->numberBetween(111111111, 999999999) . "",
                'edition'     => (string) $faker->randomDigitNotNull(),
                'format'     => $faker->word(),
                'licence_length'   => $faker->numberBetween(18, 22) . " meses",
                'price_usd'   => $faker->numberBetween(10, 30),
                'image'   => "https://picsum.photos/80/100",
                'level_id'   => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
