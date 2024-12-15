<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'KII',
            'email' => 'rizki23si@mahasiswa.pcr.ac.id',
            'password' => Hash::make('rizki123'),
            'role' => 'Admin',
        ]);
        User::create([
            'name' => 'AZUREE',
            'email' => 'rizkiaja306@gmail.com',
            'password' => Hash::make('rizki1005'),
            'role' => 'Admin',
        ]);

    }
}
