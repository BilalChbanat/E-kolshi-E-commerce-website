<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Payment;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{
    public function mollie(Request $request)
    {
        $totalDHS = 0; 
        $productsDescription = ''; 

        if (session('cart')) {
            foreach (session('cart') as $id => $details) {
                $totalDHS += $details['price'] * $details['quantity'];

                $productsDescription .= $details['name'] . ' (' . $details['quantity'] . '), ';
            }
        }

        $productsDescription = rtrim($productsDescription, ', ');

        $exchangeRate = 10;

        $totalUSD = number_format($totalDHS / $exchangeRate, 2, '.', '');

        $minAmountUSD = 1.00;

        if ($totalUSD < $minAmountUSD) {
            $totalUSD = $minAmountUSD;
        }

        $formattedAmount = number_format($totalUSD, 2, '.', '');

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "USD",
                "value" => $formattedAmount,
            ],
            "description" => $productsDescription, 
            "redirectUrl" => route('success'),
            "metadata" => [
                "order_id" => time(),
            ],
        ]);

        //dd($payment);

        session()->put('paymentId', $payment->id);
        session()->put('quantity', $request->quantity);

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function success(Request $request)
    {
        $paymentId = session()->get('paymentId');
        $payment = Mollie::api()->payments->get($paymentId);

        if ($payment->isPaid()) {
            $obj = new Payment();
            $obj->payment_id = $paymentId;
            $obj->product_name = $payment->description;
            $obj->quantity = session()->get('quantity');
            $obj->amount = $payment->amount->value;
            $obj->currency = $payment->amount->currency;
            $obj->payment_status = "Completed";
            $obj->payment_method = "Mollie";
            $obj->user_id = auth()->id();
            $obj->save();

            $order = new Order();
            $order->payment_ref = $paymentId;


            $userMadePayment = Order::where('user_id', auth()->id())->exists();
            if (!$userMadePayment) {
                $discount = $payment->amount->value * 0.10;
                $order->total_price = $payment->amount->value - $discount;
            } else {
                $order->total_price = $payment->amount->value;
            }

            $order->payment_id = $obj->id;
            $order->user_id = auth()->id();
            $order->save();

            session()->forget('paymentId');
            session()->forget('quantity');

            echo 'Payment is successful.';
        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel()
    {
        echo "Payment is cancelled.";
    }
}