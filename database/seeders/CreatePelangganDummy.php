<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreatePelangganDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 1000) as $index) {
                DB::table('pelanggan')->insert([
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'birthday' => $faker->date(),
                    'gender' => $faker->randomElement(['Male', 'Female']),
                    'email' => $faker->unique()->safeEmail,
                    'phone' => $faker->phoneNumber,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
    }
}
