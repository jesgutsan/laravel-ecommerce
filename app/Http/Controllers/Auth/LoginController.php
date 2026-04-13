<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Orders;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function logout(Request $request)
    {
        $cart = \Session::get('cart');

        $order = Orders::firstOrCreate(
            ['user_id' => auth()->id(), 'status' => 'cart'],
            ['subtotal' => 0, 'shipping' => 0]
        );

        // Borramos primero los productos antiguos del carrito en BD
        $order->order_items()->delete();

        // Si todavía hay productos en sesión, los volvemos a guardar
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

            \Session::put('cart', $cart);
        }
    }
}
