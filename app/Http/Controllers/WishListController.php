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
        $user = Auth::user();
        $wishlistItems = $user->wishlistItems;
        $wishlistCount = $wishlistItems->count();

        return view('shop.wishlist', compact('wishlistItems', 'user', 'wishlistCount'));
    }


    /**
     * Add a product to the wishlist.
     */
    public function add(int $id)
    {
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
        $wishlistItem = WishList::findOrFail($id);
        $wishlistItem->delete();

        return redirect()->route('shop.wishlist')->with('success', 'Product removed from wishlist successfully');
    }
}
