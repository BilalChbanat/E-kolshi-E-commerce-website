<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\Http\Requests\StoreWishListRequest;
use App\Http\Requests\UpdateWishListRequest;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to add products to your wishlist.');
        }
        $user = Auth::user();
        $wishlistItems = $user->wishlistItems;
        $wishlistCount = $wishlistItems->count();

        $carts = $user->carts;
        $cartCount = $carts->count();

        return view('shop.wishlist', compact('wishlistItems', 'user', 'wishlistCount', 'cartCount'));
    }


    /**
     * Add a product to the wishlist.
     */
    public function add(int $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to add products to your wishlist.');
        }

        $productId = $id;

        $existingItem = WishList::where('product_id', $productId)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingItem) {
            return redirect()->route('shop.wishlist')->with('error', 'Product already exists in wishlist');
        } else {
            $wishlistItem = new WishList();
            $wishlistItem->user_id = auth()->id();
            $wishlistItem->product_id = $productId;
            $wishlistItem->save();
        }

        return redirect()->route('shop.wishlist')->with('success', 'Product added to wishlist successfully');
    }



    /**
     * Remove a product from the wishlist.
     */
    public function remove($id)
    {

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to add products to your wishlist.');
        }
        $wishlistProduct = WishList::findOrFail($id);
        $wishlistProduct->delete();

        return redirect()->route('shop.wishlist')->with('success', 'Product removed from cart successfully');
    }
}
