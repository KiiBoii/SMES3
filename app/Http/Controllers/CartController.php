<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
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
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('Cart', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $cart = Cart::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
            ['quantity' => $request->quantity, 'price' => $request->price]
        );

        return redirect()->route('cart.index')->with('success', 'Item added to cart!');
    }

    public function destroy(Request $request)
    {
        Cart::where('id', $request->cart_id)->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
    }
