<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 5) as $index) {
            DB::table('kotas')->insert([
                'nama' => $faker->randomElement(['Bangsalsari', 'Tanggul', 'Balung', 'Kencong', 'Jember']),
            ]);
        }
    }
}
