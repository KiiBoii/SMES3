<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['username'] = 'Heroku';
        $data['last_login'] = date('Y-m-d H:i:s');
        $data['list_pendidikan'] = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];
        $data['user_data'] = [
            'umur' => 25,
            'skills' => ['Laravel', 'React', 'SQL'],
            'is_active' => true,
        ];

        return view('simple-home', $data);
    }
    public function index2()
    {
        $pageData['kode_enkripsi'] = hash('sha256', $param1);
        $pageData['tanggal_hariini'] = date('Y-m-d H:i:s');
        $pageData['username'] = 'Pak Eko';
        $pageData['list_pendidikan'] = ['S1', 'S2', 'S3'];
        return view('home');
    }

    //pertemuan 4
    public function signup(Request $request)  {

        $request->validate([
		    'name'  => 'required|max:20',
		    'email' => ['required','email'],
		    'password' => [
		        'required',           // Wajib diisi
		        'string',             // Harus berupa string
		        'min:8',              // Minimal 8 karakter
		        'regex:/[a-z]/',      // Harus mengandung setidaknya 1 huruf kecil
		        'regex:/[A-Z]/',      // Harus mengandung setidaknya 1 huruf besar
		        'regex:/[0-9]/',      // Harus mengandung setidaknya 1 angka
		    ],
		],[
            'name.required' => 'Silahkan diisikan namanya'
        ]);

            //dd($request->all()); d

            $pageData['name']     = $request->name;
      $pageData['email']    = $request->email;
      $pageData['password'] = $request->password;
      return view('signup-success', $pageData);

    }
    //pertemuan 5

    public function redirectTo(String $param1){

       if ($param1=='login') {
        //redirect pakai nama route
           return redirect('/auth')->with('info', 'Kamu datang dari home');

       }else if($param1=='belanja'){
           return redirect()->away('https:/tokopedia.com');

       }
        // return redirect('/home')->route('home');
        // return redirect('/home')->back();
    }
}
