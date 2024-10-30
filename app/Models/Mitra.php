<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $primaryKey = 'mitra_id';
    protected $table = 'mitra';
    use HasFactory;
    protected $fillable = [

        'nama_mitra',
        'alamat',
        'email',
        'nomor_telepon',
        'jenis_kemitraan',
        'tanggal_bergabung',
    ];
}
