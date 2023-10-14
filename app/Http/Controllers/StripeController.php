<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;


class StripeController extends Controller
{
    public function payment(Request $request)
    {
        Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));
        $response = Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Mobile Phone'
                        ],
                        'unit_amount' => $request->price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('stripe_success'),
            'cancel_url' => route('stripe_cancel'),
        ]);

        return redirect()->away($response->url);

    }

    public function stripe_success()
    {
        return "Payment is successful!";
    }

    public function stripe_cancel()
    {
        return "Payment is cancelled!";
    }
}
