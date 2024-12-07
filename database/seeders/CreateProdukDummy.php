<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CreateProdukDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 1000) as $index) {
            DB::table('table_produk')->insert([ // Ensure the table name is correct
                'nama_produk' => $faker->word(), // Random product name
                'deskripsi' => $faker->sentence(), // Short description (one sentence)
                'harga' => $faker->randomFloat(2, 10, 1000), // Price between 10 and 1000
                'stok' => $faker->numberBetween(1, 100), // Stock between 1 and 100
                'jenis' => $faker->randomElement(['Makanan', 'Minuman', 'Kerajinan']), // Random category
                'tgl_expired' => $faker->date('Y-m-d', 'now'), // Random expiration date
                'created_at' => now(), // Current timestamp for created_at
                'updated_at' => now(), // Current timestamp for updated_at
            ]);
        }
    }
}
