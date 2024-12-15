<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Mitra;
use App\Models\User;
use App\Models\produk;

class DashboardController extends Controller
{
    /**
     * Dashboard index.
     *
     * Redirects to login form if user is not authenticated.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch the necessary data
        $dataPelanggan = Pelanggan::all();  // Retrieve all Pelanggan (customers) or adjust the query as needed
        $totalPelanggan = Pelanggan::count();
        $totalMitra = Mitra::count();
        $totalUser = User::count();
        $totalProduk = produk::count();

        // Fetch other data like top new members, users, etc.
        $topPelangganBaru = Pelanggan::latest()->take(3)->get();
        $topProdukBaru = produk::latest()->take(3)->get();
        $topUserBaru = User::latest()->take(3)->get();

        // Return the view with the data
        return view('admin.dashboard', compact(
            'dataPelanggan', 'totalPelanggan', 'totalMitra', 'totalUser', 'totalProduk',
            'topPelangganBaru', 'topProdukBaru', 'topUserBaru'
        ));
    }
}
