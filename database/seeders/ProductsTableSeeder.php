<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 1000; $i++) {
            DB::table('products')->insert([
                'ProductName' => $faker->word,
                'Price' => $faker->randomFloat(2, 10, 1000),
                'Description' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
