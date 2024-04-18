<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the shopping cart.
     */
    public function index()
    {
        $user = Auth::user();
        $carts = $user->carts;
        $cartCount = $carts->count();

        return view('shop.cart', compact('carts', 'user', 'cartCount'));
    }


    /**
     * Add a product to the shopping cart.
     */
    public function add(int $id)
    {
        $productId = $id;
        $quantity = 1;

        $existingItem = Cart::where('product_id', $productId)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingItem) {
            $existingItem->quantity += $quantity;
            $existingItem->save();
        } else {
            $cartItem = new Cart();
            $cartItem->user_id = auth()->id();
            $cartItem->product_id = $productId;
            $cartItem->quantity = $quantity; // Corrected typo here
            $cartItem->save();
        }

        return redirect()->route('shop.cart')->with('success', 'Product added to cart successfully');
    }



    /**
     * Update the quantity of a product in the shopping cart.
     */
    public function update(Request $request, int $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->quantity = $request->quantity; 
        $cart->save(); 

        return redirect()->route('shop.cart')->with('success', 'Cart updated successfully');
    }



    /**
     * Remove a product from the shopping cart.
     */
    public function remove($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('shop.cart')->with('success', 'Product removed from cart successfully');
    }
}
