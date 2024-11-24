<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Dashboard index.
     *
     * Redirects to login form if user is not authenticated.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
/******  575f8b9b-1f44-44ce-9638-38b3d7f67f68  *******/
    public function index()
    {
        return view('admin.dashboard');
    }

}
