<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Constructor per a inicialitzar l'array de la cistella en la sessió
    public function __construct()
    {
        if (!Session::has('cart')) {
            Session::put('cart', []);
        }
    }

    // Afegir nous productes a la cistella
    public function add(Product $product)
    {
        $cart = Session::get('cart');

        $product->quantity = 1;
        $cart[$product->slug] = $product;

        Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    // Mostrar i llegir el contingut de la cistella
    public function show()
    {
        $cart = Session::get('cart');
        $total = $this->total();

        return view('store.cart', compact('cart', 'total'));
    }

    // Actualitzar la cistella
    public function update(Product $product, $quantity)
    {
        $cart = Session::get('cart');

        if (isset($cart[$product->slug])) {
            $cart[$product->slug]->quantity = $quantity;
        }

        Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    // Càlcul del total de la cistella
    private function total()
    {
        $cart = Session::get('cart');
        $total = 0;

        foreach ($cart as $item) {
            $total += $item->price * $item->quantity;
        }

        return $total;
    }

    // Esborrar un producte de la cistella
    public function delete(Product $product)
    {
        $cart = Session::get('cart');

        unset($cart[$product->slug]);

        Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    // Buidar la cistella completa
    public function trash()
    {
        if (Auth::check()) {
            $order = Orders::where('user_id', Auth::id())
                ->where('status', 'cart')
                ->first();

            if ($order) {
                $order->order_items()->delete();
            }
        }

        Session::forget('cart');

        return redirect()->route('cart-show');
    }

    // Mostrar el detall de la comanda abans del pagament
    public function OrderDetail()
    {
        if (count(Session::get('cart')) <= 0) {
            return redirect()->route('home');
        }

        $cart = Session::get('cart');
        $total = $this->total();

        return view('store.order-detail', compact('cart', 'total'));
    }
}
