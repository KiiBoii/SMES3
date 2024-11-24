<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateMitraDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 1000) as $index) {
                DB::table('mitra')->insert([
                    'nama' => $faker->nama,
                    'email' => $faker->unique()->safeEmail,
                    'Password' => bcrypt('Password'),
                    'role' => $faker->randomElement([ 'Admin', 'Pelanggan', 'Mitra']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
        //
    }
}
