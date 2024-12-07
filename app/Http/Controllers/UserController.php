<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $filterableColumns =['role'];
        $searchableColumns=['name'];
        $pageData['dataUser'] = User::filter( $request,$filterableColumns,$searchableColumns )
        ->paginate(10)
        ->onEachSide(2)
        ->withQueryString();
        return view('admin.User.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'Password' => ['required', 'password'],
            'role'     => ['required', 'in:Admin,Pelanggan,Mitra'],

        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['Password'] = Hash::make($request->Password);
        $data['role'] = $request->role;

        User::create($data);

        return redirect()->route('User.list')->with('success', 'Penambahan user Berhasil!');

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
        $pageData['dataUser'] = User::findOrFail($param1);
        return view('admin.User.edit', $pageData);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([

        ]);
        $User = $request->id;
        $User = User::findOrFail($User);

        $User->name = $request->name;
        $User->email = $request->email;
        $User->Password = $request->Password;
        $User->role = $request->role;
        $User->save();

        return redirect()->route('User.list')->with('success', 'Data user Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $User = User::findOrFail($param1);
        $User->delete();
        return redirect()->route('User.list')->with('success', 'Data user Berhasil Dihapus');
    }
}
