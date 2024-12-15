<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['role'];
        $searchableColumns = ['name'];
        $pageData['dataUser'] = User::filter($request, $filterableColumns, $searchableColumns)
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
        // Validate incoming request data
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'], // Ensure unique email
            'password' => ['required'], // Password is required and must be at least 8 characters
            'role' => ['required', 'in:Admin,Pelanggan,Mitra'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
            'profile_cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Validasi profile cover
        ]);

        // Prepare data for the new user
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Ensure the password is hashed
            'role' => $request->role,
        ];

        // Handle file upload for image if exists
        if ($request->hasFile('gambar')) {
            // Store the image in the 'user_images' folder under the 'public' disk
            $data['gambar'] = $request->file('gambar')->store('User', 'public');
        }
        // Proses unggah gambar cover jika ada
        if ($request->hasFile('profile_cover')) {
            // Store the image in the 'user_images' folder under the 'public' disk
            $data['profile_cover'] = $request->file('profile_cover')->store('profile_cover', 'public');
        }

        // Create the user in the database
        User::create($data);

        // Redirect with success message
        return redirect()->route('User.list')->with('success', 'Penambahan user Berhasil!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {
        $pageData['dataUser'] = User::findOrFail($param1);
        return view('admin.User.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required', 'in:Admin,Pelanggan,Mitra'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'profile_cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Optional image validation
        ]);

        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email = $request->email;

        // Only update the password if it's provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->role = $request->role;

        // Handle profile image update
        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            if ($user->gambar) {
                Storage::disk('public')->delete($user->gambar);
            }

            // Simpan file gambar baru
            $user->gambar = $request->file('gambar')->store('user', 'public');
        }
        if ($request->hasFile('profile_cover')) {
            // Hapus file lama jika ada
            if ($user->profile_cover) {
                Storage::disk('public')->delete($user->profile_cover);
            }

            // Simpan file gambar baru
            $user->profile_cover = $request->file('profile_cover')->store('profile_cover', 'public');
        }

        // Save the updated user data
        $user->save();

        return redirect()->route('User.list')->with('success', 'Data user Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $user = User::findOrFail($param1);

        // Delete the user's profile picture if it exists
        if ($user->gambar) {
            Storage::disk('public')->delete($user->gambar);
        }

        $user->delete();

        return redirect()->route('User.list')->with('success', 'Data user Berhasil Dihapus');
    }
}
