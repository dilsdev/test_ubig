<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('siswas')->insert([
                'nis' => $faker->unique()->numberBetween(100000, 999999),
                'nama' => $faker->name,
                'tanggal_lahir' => $faker->date,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->randomElement(['Bangsalsari', 'Tanggul', 'Balung', 'Kencong', 'Jember']),
                'id_kota' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
