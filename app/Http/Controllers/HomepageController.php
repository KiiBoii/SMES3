<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class HomepageController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        $produks = Produk::all();
        return view('homepage', compact('produks'));
        if (Auth::guest()) {
            return redirect()->route('login-form');
        }

        $filterableColumns = ['jenis', 'tgl_expired'];
        $searchableColumns = ['nama_produk'];

        $pageData['dataProduk'] = produk::filter($request, $filterableColumns, $searchableColumns)
            ->paginate(10)
            ->onEachSide(2)
            ->withQueryString();

        return view('homepage', $pageData);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        if (Auth::guest()) {
            return redirect()->route('login-form');
        }

        return view('admin.produk.create');
    }

    /**
     * Store a newly created product.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required'],
            'deskripsi' => ['required'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'jenis' => ['required', 'in:Makanan,Minuman,Kerajinan'],
            'tgl_expired' => ['required', 'date'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $data = $request->only(['nama_produk', 'deskripsi', 'harga', 'stok', 'jenis', 'tgl_expired']);

        // Save the product image
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        produk::create($data);

        return redirect()->route('produk.list')->with('success', 'Penambahan Produk Berhasil!');
    }

    /**
     * Show the form for editing a specific product.
     */
    public function edit(string $param1)
    {
        if (Auth::guest()) {
            return redirect()->route('login-form');
        }

        $pageData['dataProduk'] = produk::findOrFail($param1);
        return view('admin.produk.edit', $pageData);
    }

    /**
     * Update a specific product.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required'],
            'deskripsi' => ['required'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'jenis' => ['required', 'in:Makanan,Minuman,Kerajinan'],
            'tgl_expired' => ['required', 'date'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $produk_id = $request->produk_id;
        $produk = produk::findOrFail($produk_id);

        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->jenis = $request->jenis;
        $produk->tgl_expired = $request->tgl_expired;

        // Update the image if there's a new one
        if ($request->hasFile('gambar')) {
            // Delete the old image if exists
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }

            // Save the new image
            $produk->gambar = $request->file('gambar')->store('produk', 'public');
        }

        $produk->save();

        return redirect()->route('produk.list')->with('success', 'Data Produk Berhasil Diubah');
    }

    /**
     * Remove a specific product from storage.
     */
    public function destroy(string $param1)
    {
        if (Auth::guest()) {
            return redirect()->route('login-form');
        }

        $produk = produk::findOrFail($param1);
        $produk->delete();

        return redirect()->route('produk.list')->with('success', 'Data Produk Berhasil Dihapus');
    }
}
