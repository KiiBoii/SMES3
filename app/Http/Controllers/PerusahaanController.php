<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index() {
        echo "Halaman daftar pegawai";
    }

    public function store(String $param1,$param2) {
        echo "Simpan pegawai dengan data Nama: $param1, Alamat: $param2";
    }

    public function show($param1) {
        echo "Mengambil data pegawai ID = $param1";
    }

    public function edit($param1) {
        echo "Halaman perubahan data pegawai milik ID = $param1";
    }

    public function destroy($param1) {
        echo "Hapus data pegawai yang memiliki ID = $param1";
    }
}
