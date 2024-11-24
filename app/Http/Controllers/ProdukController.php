<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageData['dataProduk'] = produk:: all();
        return view('admin.produk.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required'],
            'deskripsi'  => ['required'],
            'harga'   => ['required', 'numeric'],
            'stok'   => ['required', 'numeric'],
            'jenis'     => ['required', 'in:Makanan,Minuman,Kerajinan'],
            'tgl_expired'      => ['required', 'date'],
        ]);
        $data['nama_produk'] = $request->nama_produk;
$data['deskripsi'] = $request->deskripsi;
$data['harga'] = $request->harga;
$data['stok'] = $request->stok;
$data['jenis'] = $request->jenis;
$data['tgl_expired'] = $request->tgl_expired;

produk::create($data);

return redirect()->route('produk.list')->with('success','Penambahan Produk Berhasil!');

        //dd($request->all());


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {
        $pageData['dataProduk']=produk::findOrFail($param1);
        return view('admin.produk.edit',$pageData);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required'],
            'deskripsi'  => ['required'],
            'harga'   => ['required', 'numeric'],
            'stok'   => ['required', 'numeric'],
            'jenis'     => ['required', 'in:Makanan,Minuman,Kerajinan'],
            'tgl_expired'      => ['required', 'date'],
             ]);
             $produk_id=  $request->produk_id;
             $produk = produk::findOrFail ($produk_id);

              $produk->nama_produk=$request->nama_produk;
              $produk->deskripsi=$request->deskripsi;
              $produk->harga=$request->harga;
              $produk->stok=$request->stok;
              $produk->jenis=$request->jenis;
              $produk->tgl_expired=$request->tgl_expired;
              $produk->save();

              return redirect()->route('produk.list')->with('success','Data Produk Berhasil Diubah');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $produk = produk::findOrFail($param1);
        $produk->delete();
        return redirect()->route('produk.list')->with('success','Data Produk Berhasil Dihapus');
    }
}
