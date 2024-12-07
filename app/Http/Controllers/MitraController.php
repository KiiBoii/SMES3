<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        // Fetch all mitra data
        $filterableColumns =['jenis_kemitraan', 'tanggal_bergabung'];
        $searchableColumns=['nama_mitra'];
        $pageData['dataMitra'] = Mitra::filter( $request,$filterableColumns,$searchableColumns )
        ->paginate(10)
        ->onEachSide(2)
        ->withQueryString();
        return view('admin.mitra.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return view for creating new mitra
        return view('admin.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama_mitra' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:50', 'unique:mitra,email'],
            'nomor_telepon' => ['required', 'string', 'regex:/^[0-9]+$/'],
            'jenis_kemitraan' => ['required', 'in:Platinum,Gold,Silver'],
            'tanggal_bergabung' => ['required', 'date'],
            'data_valid' => ['accepted'], // Checkbox validation
        ]);

        // Prepare the data for insertion
        $data = [
            'nama_mitra' => $request->nama_mitra,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'jenis_kemitraan' => $request->jenis_kemitraan,
            'tanggal_bergabung' => $request->tanggal_bergabung,
        ];

        // Create new mitra
        Mitra::create($data);

        return redirect()->route('mitra.index')->with('success', 'Mitra added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the mitra to edit
        $pageData['dataMitra'] = Mitra::findOrFail($id);
        return view('admin.mitra.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'mitra_id' => ['required'],
            'nama_mitra' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:50'],
            'nomor_telepon' => ['required', 'string', 'regex:/^[0-9]+$/'],
            'jenis_kemitraan' => ['required', 'in:Platinum,Gold,Silver'],
            'tanggal_bergabung' => ['required', 'date'],
        ]);

        // Find the mitra to update
        $mitra = Mitra::findOrFail($request->mitra_id);

        // Update the mitra details
        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->alamat = $request->alamat;
        $mitra->email = $request->email;
        $mitra->nomor_telepon = $request->nomor_telepon;
        $mitra->jenis_kemitraan = $request->jenis_kemitraan;
        $mitra->tanggal_bergabung = $request->tanggal_bergabung;
        $mitra->save();

        return redirect()->route('mitra.index')->with('success', 'Mitra updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $mitra = Mitra::findOrFail($param1);
        $mitra->delete();
        return redirect()->route('mitra.index')->with('success','Data Mitra Pelanggan Berhasil Dihapus');
    }
}
