<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_produk', function (Blueprint $table) {
            $table->increments('produk_id');
            $table->string('nama_produk', 200);
            $table->string('deskripsi');
            $table->integer('harga')->nullable();
            $table->integer('stok')->nullable();
            $table->enum('jenis', ['Makanan', 'Minuman', 'Kerajinan'])->nullable();
            $table->date('tgl_expired')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_produk');
    }
};
