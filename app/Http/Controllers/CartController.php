<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Show the cart items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the user's cart items along with the product details
        $cartItems = Cart::where('user_id', auth()->id())
            ->with('product') // Ensure you have a 'product' relationship defined in the Cart model
            ->get();

        // Calculate the subtotal (total price) for the cart
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('USER.Cart', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
        ]);
    }

    /**
     * Add an item to the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Retrieve the product
        $product = Produk::find($request->product_id);

        // Add to cart or update quantity
        $cartItem = Cart::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
            ['quantity' => $request->quantity, 'price' => $product->harga]
        );

        // Return updated cart items and subtotal
        $cartItems = Cart::where('user_id', auth()->id())
            ->with('product')
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Return updated cart data as JSON
        return response()->json([
            'message' => 'Product added to cart!',
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
        ]);
    }

    /**
     * Remove an item from the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Ensure cart item exists and delete it
        Cart::where('id', $request->cart_id)
            ->where('user_id', auth()->id()) // Ensure the user is deleting their own cart item
            ->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    /**
     * Add product to cart using product ID.
     *
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function addToCart($productId)
    {
        // Retrieve the product
        $product = Product::findOrFail($productId);

        // Default quantity is 1
        $quantity = 1;

        // Add or update the product in the cart
        Cart::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $productId],
            ['quantity' => $quantity, 'price' => $product->harga]
        );

        // Redirect to the homepage with a success message
        return redirect()->route('homepage')->with('success', 'Product added to cart!');
    }

    // Add the relationship in the Cart model to get the associated Product
    public function produk()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
