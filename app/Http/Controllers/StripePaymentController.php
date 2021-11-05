<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    //
    /* Creates the checkout session and returns the session id in JSON format */
    public function payment() {
        // We grab the Stripe key information we added in the .env file
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Creates the Stripe session
        $session = \Stripe\Checkout\Session::create ([
            'payment_method_types' => ['card'],
            'billing_address_collection' => 'required',
            'shipping_address_collection' => ['allowed_countries' => ['US', 'CA'],],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'T-shirt',
                    ],
                    'unit_amount' => 2000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'success_url' => 'http://127.0.0.1:8000/',
            'cancel_url' => 'http://127.0.0.1:8000/',
        ]);

        // Return the Stripe Session id so the fetch command in our frontend redirects users to Stripe's checkout page
        return response()->json(['id' => $session->id]);
    }
}
