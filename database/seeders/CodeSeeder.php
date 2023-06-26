<?php

namespace Database\Seeders;

use App\Models\Code;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            Code::create([
                'code'  => (string) $faker->numberBetween(111111111, 999999999),
                'sold'  => false,
                'product_id'  => $faker->numberBetween(3, 10),
                'order_id'  => null,
            ]);
        }
    }
}
