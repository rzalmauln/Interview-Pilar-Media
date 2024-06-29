<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalespersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 1000; $i++) {
            DB::table('salespersons')->insert([
                'SalesPersonName' => $faker->name,
                'Address' => $faker->address,
                'ContactNumber' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
