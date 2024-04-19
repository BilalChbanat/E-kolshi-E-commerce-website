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
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to add products to your wishlist.');
        }
        $user = Auth::user();
        
        $carts = $user->carts;
        $cartCount = $carts->count();

        $wishlistItems = $user->wishlistItems;
        $wishlistCount = $wishlistItems->count();

        return view('shop.cart', compact('carts', 'user', 'cartCount','wishlistCount'));
    }


    /**
     * Add a product to the shopping cart.
     */
    public function add(int $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to add products to your wishlist.');
        }
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
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to add products to your wishlist.');
        }

        $cart = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->route('shop.cart')->with('success', 'Cart updated successfully');
    }



    /**
     * Remove a product from the shopping cart.
     */
    public function remove($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to add products to your wishlist.');
        }
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('shop.cart')->with('success', 'Product removed from cart successfully');
    }

}
