<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function create()
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->post('https://api-m.sandbox.paypal.com/v2/checkout/orders', [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => [
                        'currency_code' => 'EUR',
                        'value' => '10.00'
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
            return redirect()->route('home')->with('error', 'No s\'ha pogut crear la comanda.');
    }

    public function status(Request $request)
    {
        $token = $this->getAccessToken();
        $orderId = $request->query('token');

        $response = Http::withToken($token)
            ->post("https://api-m.sandbox.paypal.com/v2/checkout/orders/{$orderId}/capture");

        $result = $response->json();
        dd($result);
        if (isset($result['status']) && $result['status'] === 'COMPLETED') {

            return redirect()->route('cart-show')
                ->with('message', 'Pagament realitzat correctament amb PayPal.');
        }

        return redirect()->route('cart-show')
            ->with('message', 'No s\'ha pogut confirmar el pagament.');
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


