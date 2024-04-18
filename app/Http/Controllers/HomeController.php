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

        $carts = $user->carts;
        $cartCount = $carts->count();
        // Get the selected category from the request, defaulting to 'all' if not present
        $selectedCategory = $request->query('category', 'all');

        // Fetch all categories
        $categories = Category::all(); // Assuming you have a Category model

        // Query products based on the selected category
        $products = Product::when($selectedCategory != 'all', function ($query) use ($selectedCategory) {
            $query->whereHas('category', function ($q) use ($selectedCategory) {
                $q->where('id', $selectedCategory);
            });
        })->paginate(10);

        // Pass user, products, categories, and selectedCategory to the view
        return view('welcome', compact('user', 'products', 'categories', 'selectedCategory', 'cartCount'));
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
