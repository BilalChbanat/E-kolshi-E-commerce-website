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

        $totalAmount = 0;
        $lineItems = [];

        $user = Auth::user();
        $carts = $user->carts;

        foreach ($carts as $cart) {
            $product = $cart->product;
            $unitAmount = $product->price * 10;
            $quantity = $cart->quantity;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->title,
                    ],
                    'unit_amount' => $unitAmount,
                ],
                'quantity' => $quantity,
            ];

            // Calculate the total amount for the order
            $totalAmount += ($unitAmount * $quantity);
        }

        // Create a Checkout session with the calculated line items
        $checkout_session = Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('pay.success', $totalAmount), // Change this to your actual success route
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

        // Decrement the QuantityAvailable for each product in the cart
        $carts = $user->carts;
        foreach ($carts as $cart) {
            $product = $cart->product;
            if ($product->QuantityAvailable >= $cart->quantity) {
                $product->QuantityAvailable -= $cart->quantity;
                $product->save();
            } else {
                return redirect()->back()->with('error', 'Insufficient quantity available for ' . $product->title);
            }
        }

        $user->carts()->delete();

        return view('success', compact('user'));
    }

}
