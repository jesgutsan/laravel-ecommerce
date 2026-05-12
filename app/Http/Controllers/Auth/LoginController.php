<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function logout(Request $request)
    {
        $cart = Session::get('cart');

        $order = Orders::firstOrCreate(
            ['user_id' => Auth::id(), 'status' => 'cart'],
            ['subtotal' => 0, 'shipping' => 0]
        );

        // Esborrem primer els productes antics del carret en BD
        $order->order_items()->delete();

        // Si encara hi ha productes en sessió, els tornem a guardar
        if ($cart && count($cart) > 0) {
            foreach ($cart as $item) {
                $order->order_items()->create([
                    'product_id' => $item->id,
                    'price' => $item->price,
                    'quantity' => $item->quantity
                ]);
            }
        }

        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function authenticated(Request $request, $user)
    {
        $order = Orders::where('user_id', $user->id)
            ->where('status', 'cart')
            ->first();

        if ($order) {
            $cart = [];

            foreach ($order->order_items as $item) {
                $product = $item->product;
                $product->quantity = $item->quantity;
                $cart[$product->slug] = $product;
            }

            if (!Session::has('cart') || count(Session::get('cart')) == 0) {
                Session::put('cart', $cart);
            }
        }
    }
}
