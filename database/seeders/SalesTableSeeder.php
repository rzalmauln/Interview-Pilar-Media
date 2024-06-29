<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ini_set('memory_limit', '550M');
        $faker = Faker::create();
        $batchSize = 100;

        for ($i = 0; $i < 2000; $i++) {
            $salesData = [];
            for ($j = 0; $j < $batchSize; $j++) {
                $salesData[] = [
                    'SalesDate' => $faker->date(),
                    'ProductID' => $faker->numberBetween(1, 1000),
                    'SalesAmount' => $faker->randomFloat(2, 10, 1000),
                    'SalesPersonID' => $faker->numberBetween(1, 1000),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            DB::table('sales')->insert($salesData);
        }
    }
}
