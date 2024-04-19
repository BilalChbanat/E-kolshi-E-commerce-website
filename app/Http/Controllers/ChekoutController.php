<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChekoutController extends Controller
{
    public $carts, $total;

    public function totalProducts()
    {
        $this->carts = Cart::where('user_id', Auth::id())->get();

        foreach ($this->carts as $cart) {
            $this->total += $cart->product->price * $cart->quantity;
        }
        return $this->total;
    }

    public function index()
    {
        $user = Auth::user();
        $this->total = $this->totalProducts();
        $totalprice = $this->total;
        return view('checkout.index', compact('user', 'totalprice'));
    }
}
