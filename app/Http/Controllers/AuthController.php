<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'address' => ['required', 'max:300'],
            'dob' => ['required', 'date'],
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:8', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Jika password dan confirm password tidak sama
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('error', 'Confirm Password tidak sesuai')->withInput();
        }

        // Proses registrasi berhasil
        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil! Silahkan Login');
    }

    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => ['min:3', 'regex:/[A-Z]/'],
        ]);

        $username = $request->username;
        $password = $request->password;

        $nim = 'Nim2357301007';

        if ($username == $nim && $password == $nim) {
            session([
                'username' => $request->username,
                'last_login' => date('Y-m-d H:i:s'),
            ]);
            return redirect('/homepage')->with('status', 'success');
        } else {
            session()->flush();
            return redirect('/auth')->with('status', 'error');
        }
    }

    public function logout()
    {
        // Hapus semua sesi
        session()->flush();

        // Arahkan kembali ke halaman login dengan pesan sukses
        return redirect('/auth')->with('status', 'success')->with('message', 'Logout berhasil, silahkan login kembali');
    }

}
