<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function create()
    {
        $cart = \Session::get('cart');

        if (!$cart || count($cart) == 0) {
            return redirect()->route('cart-show')
                ->with('error', 'La cistella està buida.');
        }

        $total = 0;

        foreach ($cart as $producte) {
            $total += $producte->price * $producte->quantity;
        }

        $enviament = 100;
        $total += $enviament;



        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->post('https://api-m.sandbox.paypal.com/v2/checkout/orders', [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => [
                        'currency_code' => 'EUR',
                        'value' => number_format($total, 2, '.', '')
                    ]
                ]],
                'application_context' => [
                    'return_url' => route('payment-new.status'),
                    'cancel_url' => route('cart-show')
                ]
            ]);

        $order = $response->json();

        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }

        return redirect()->route('home')
            ->with('error', 'No s\'ha pogut crear la comanda.');
    }

    public function status(Request $request)
    {
        $token = $this->getAccessToken();
        $orderId = $request->get('token');

        $response = Http::withToken($token)
            ->withBody('{}', 'application/json')
            ->post("https://api-m.sandbox.paypal.com/v2/checkout/orders/{$orderId}/capture");

        $result = $response->json();

        if (isset($result['status']) && $result['status'] === 'COMPLETED') {
            \Session::forget('cart');

            return redirect()->route('cart-show')
                ->with('message', 'Pagament realitzat correctament amb PayPal.');
        }

        return redirect()->route('cart-show')
            ->with('error', 'No s\'ha pogut confirmar el pagament.');
    }

    private function getAccessToken()
    {
        $response = Http::withBasicAuth(
            env('PAYPAL_CLIENT_ID'),
            env('PAYPAL_SECRET')
        )->asForm()->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
            'grant_type' => 'client_credentials'
        ]);

        return $response->json()['access_token'];
    }
}


