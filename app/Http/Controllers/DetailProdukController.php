<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class DetailProdukController extends Controller
{
    /**
     * Halaman login.
     *
     * Jika user sudah login, maka akan dialihkan ke halaman dashboard.
     * Jika belum, maka akan ditampilkan form login.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('DetailProduk');

    }

    public function store()
    {

    }

    public function destroy()
    {

    }
    }
