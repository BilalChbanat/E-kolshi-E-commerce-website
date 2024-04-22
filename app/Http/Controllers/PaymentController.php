<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        // Set your Stripe secret API key
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a Checkout session
        $checkout_session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Product Name', // Change this to the actual product name
                        ],
                        'unit_amount' => $request->total * 10,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('pay.success', $request->total), // Change this to your actual success route
        ]);

        // Redirect the user to the Checkout page
        return redirect($checkout_session->url);
    }

    public function success(Request $request, float $total)
    {

        $user = Auth::user();
        $totalAmount = $request->total;
        $currency = 'USD';
        $userId = Auth::id();

        // Create a new order record
        $order = Order::create([
            'user_id' => $userId,
            'total_amount' => $totalAmount,
            'currency' => $currency,
            'status' => 'paid',
        ]);

        // Create a new payment record
        Payment::create([
            'user_id' => $userId,
            'order_id' => $order->id,
            'amount' => $totalAmount,
            'currency' => $currency,
            'payment_method' => 'stripe',
        ]);

        // Redirect to the success page
        return view('success', compact('user'));
    }
}
