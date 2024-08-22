<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }
    public function stripeCheckout(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $redirectUrl = route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}';
        
        $response = $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'cancel_url' => route('stripe.index'), // You might also want to add a cancel URL
            'payment_method_types' => ['link', 'card'],
            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => $request->product,
                        ],
                        'unit_amount' => 100 * $request->price, // Amount in cents
                        'currency' => 'USD',
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'customer_email' => 'sohailqureshi@gmail.com',
        ]);
       
        return redirect($response['url']);
    }
    
    public function stripeCheckoutSuccess(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $response = $stripe->checkout->sessions->retrieve($request->session_id);
        return redirect()->route('stripe.index')->with('success', 'Payment Successful');
    }
}
