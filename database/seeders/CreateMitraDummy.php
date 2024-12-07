<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CreateMitraDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 1000) as $index) {
            DB::table('mitra')->insert([
                'nama_mitra' => $faker->company, // Nama perusahaan
                'alamat' => $faker->address, // Alamat lengkap
                'email' => $faker->unique()->safeEmail, // Email unik
                'nomor_telepon' => $faker->phoneNumber, // Nomor telepon
                'jenis_kemitraan' => $faker->randomElement(['Platinum', 'Gold', 'Silver']), // Jenis kemitraan
                'tanggal_bergabung' => $faker->date('Y-m-d', 'now'), // Tanggal bergabung
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
