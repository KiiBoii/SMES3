<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        if (!Auth::guest()) {
            return redirect()->route('login-form');
        }
        return view('homepage');
    }
    //
}
