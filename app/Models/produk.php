<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $primaryKey = 'produk_id';
    protected $table = 'table_produk';

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'jenis',
        'tgl_expired'
    ];
}
