<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produk_id',
        'quantity',
        'price',
    ];

// Di model Cart
public function produk()
{
    return $this->belongsTo(produk::class, 'product_id', 'produk_id');
}

}
