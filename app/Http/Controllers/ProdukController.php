<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\PasswordResetServiceProvider;
use Illuminate\Support\Facades\PasswordBroker;
use Illuminate\Support\Facades\PasswordReset;
use Illuminate\Support\Facades\PasswordToken;
use Illuminate\Support\Facades\PasswordTokenFactory;
use Illuminate\Support\Facades\PasswordTokenRepository;
use Illuminate\Support\Facades\PasswordTokenRepositoryInterface;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cart;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $filterableColumns = ['jenis', 'tgl_expired'];
        $searchableColumns = ['nama_produk'];
        $pageData['dataProduk'] = produk::filter($request, $filterableColumns, $searchableColumns)
            ->paginate(10)
            ->onEachSide(2)
            ->withQueryString();
        return view('admin.produk.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:produk,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil produk berdasarkan ID
        $product = Produk::find($request->product_id);

        // Perbarui atau buat item cart
        $cartItem = Cart::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
            [
                'quantity' => $request->quantity,
                'price' => $product->harga,
            ]
        );

        // Dapatkan semua item cart terbaru
        $cartItems = Cart::where('user_id', auth()->id())
            ->with('product') // Pastikan ada relasi 'product' di model Cart
            ->get();

        // Hitung subtotal
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Kembalikan JSON untuk AJAX response
        return response()->json([
            'message' => 'Product added to cart!',
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function showProducts(Request $request)
    {
        $query = Produk::query();

        // Apply search if present
        if ($request->has('search') && $request->search) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        // Apply filter for 'jenis' if present in the request
        if ($request->has('jenis') && $request->jenis) {
            $query->where('jenis', $request->jenis);
        }

        // Get paginated products
        $products = $query->paginate(12)->withQueryString();

        return view('USER.homepage', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {
        $pageData['dataProduk'] = produk::findOrFail($param1);
        return view('admin.produk.edit', $pageData);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required'],
            'deskripsi' => ['required'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'jenis' => ['required', 'in:Makanan,Minuman,Kerajinan'],
            'tgl_expired' => ['required', 'date'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Validasi untuk gambar opsional
        ]);

        $produk_id = $request->produk_id;
        $produk = produk::findOrFail($produk_id);

        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->jenis = $request->jenis;
        $produk->tgl_expired = $request->tgl_expired;

        // Perbarui file gambar jika ada unggahan baru
        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }

            // Simpan file gambar baru
            $produk->gambar = $request->file('gambar')->store('produk', 'public');
        }

        $produk->save();

        return redirect()->route('produk.list')->with('success', 'Data Produk Berhasil Diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $produk = produk::findOrFail($param1);
        $produk->delete();
        return redirect()->route('produk.list')->with('success', 'Data Produk Berhasil Dihapus');
    }


}
