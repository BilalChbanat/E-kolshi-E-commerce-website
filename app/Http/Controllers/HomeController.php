<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $cartCount = 0;
        $wishlistCount = 0;

        if ($user) {
            $carts = $user->carts;
            $cartCount = $carts->count();

            $wishlistItems = $user->wishlistItems;
            $wishlistCount = $wishlistItems->count();
        }

        $selectedCategory = $request->query('category', 'all');
        $categories = Category::all(); // Assuming you have a Category model

        $productsQuery = Product::query();
        if ($selectedCategory !== 'all') {
            $productsQuery->whereHas('category', function ($q) use ($selectedCategory) {
                $q->where('id', $selectedCategory);
            });
        }
        $products = $productsQuery->paginate(10);

        return view('welcome', compact('user', 'products', 'categories', 'selectedCategory', 'cartCount', 'wishlistCount'));
    }


    public function showProducts(Request $request)
    {
        $products = Product::all();
        if (!empty($request->keyword)) {
            $products = Product::where("title", "like", "%" . $request->keyword . "%")->get();
            return view('searchResault', compact('products'));

        } else {
            $products = Product::all();
            return view('searchResault', compact('products'));
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
