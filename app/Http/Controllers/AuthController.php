<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
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
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('login-form');


    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => [
                'required', // Wajib diisi

            ],
        ], [
            'password.min' => 'Password minimal 3 karakter',
            'password.regex' => 'Password harus mengandung setidaknya 1 huruf kapital',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            Session::flush();

            $result = 'error';
        }

        return redirect()->route('login-form')->with('result', $result);
    }

    public function logout(Request $request)
    {
        // Hapus semua sesi
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login-form');
    }
    public function show_forgot_password(Request $request)
    {

        return view('lupa-password', $request);
    }
    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}


public function handleGoogleCallback()
{
    $googleUser = Socialite::driver('google')->stateless()->user();
    $email_user = $googleUser->email;
    $user = User::where('email', $email_user)->first();
    if ($user) {
        Auth::login($user);
        return redirect()->route('dashboard');
    } else {
        Session::flush();

        $result = 'error';
    }

    return redirect()->route('login-form')->with('result', $result);

    /** Kode untuk autentikasi dan redirect */
}
    public function do_forgot_password(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // if ($request 'email' == '2357301004@gmail.com') {
        //     return redirect()->route('login')->with('success', 'link lupa password sudah di kirimkan ke email');
        // }else {
        //     return redirect()->route('login')->with('error', 'email yang di msukkan tidak valid');

        // }

    }

}
