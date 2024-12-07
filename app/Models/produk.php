<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
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
        'tgl_expired',
        'gambar', // Pastikan gambar disertakan dalam fillable
    ];

    /**
     * Scope untuk filter data berdasarkan parameter yang diberikan.
     */
    public function scopeFilter(Builder $query, $request, array $filterableColumns, array $searchableColumns): Builder
    {
        // Filter berdasarkan kolom yang dapat difilter
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                if ($column == 'tgl_expired') {
                    // Memfilter berdasarkan tahun expired, bisa diperluas untuk bulan atau tanggal lengkap
                    $query->whereYear('tgl_expired', $request->input($column));
                } else {
                    $query->where($column, $request->input($column));
                }
            }
        }

        // Filter berdasarkan pencarian di kolom yang dapat dicari
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    // Menambahkan pencarian dengan LIKE
                    $q->orWhere($column, 'LIKE', '%' . $request->input('search') . '%');
                }
            });
        }

        return $query;
    }
}
