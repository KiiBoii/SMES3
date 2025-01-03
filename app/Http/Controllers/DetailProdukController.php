<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class DetailProdukController extends Controller
{
    /**
     * Display the details of a single product.
     *
     * @param  string  $nama_produk
     * @return \Illuminate\Http\Response
     */
    public function index($nama_produk)
    {
        // Fetch the product by its name (nama_produk)
        $product = Produk::where('nama_produk', $nama_produk)->firstOrFail();

        // Fetch all other products excluding the current product
        $relatedProducts = Produk::where('nama_produk', '!=', $nama_produk)->get();

        // Return the view with product data
        return view('USER.DetailProduk', compact('product', 'relatedProducts'));
    }
}
