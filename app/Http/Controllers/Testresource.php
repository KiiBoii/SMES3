<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Testresource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo "Selamat datang di halaman pegawai";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(String $param1, String $param2)
    {
        echo "Isi nama / Alamat pegawai ";

    }

    /**
     * Display the specified resource.
     */
    public function show($param1)
    {
        echo "Menampilkan data pegawai ";
        echo $param1;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        echo "Redirect ke halaman perubahan data pegawai milik ID = ".$id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo "Hapus data pegawai yang memiliki ID" .$id;
    }
}
