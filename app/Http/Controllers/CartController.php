<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    //Constructor per a inicialitzar l'array de la cistella en la sessió
    public function __construct() {
        if (!\Session::has('cart')) {
            \Session::put('cart', array());
        }
    }

    //Afegir nous productes a la cistella
    public function add(Product $product) {
        $cart = \Session::get('cart'); //Recuperem la cistella actual de la sessió
        $product->quantity = 1; //Assignem la quantitat inicial a 1
        $cart[$product->slug] = $product; //Afegim el producte usant el 'slug' com a índex
        \Session::put('cart', $cart); //Actualitzem la sessió amb la nova cistella

        //Redirigim a la vista de la cistella perquè l'usuari veja el canvi
        return redirect()->route('cart-show');
    }

    //Mostrar i llegir el contingut de la cistella
    public function show() {
        $cart = \Session::get('cart');
        $total = $this->total(); //Calculem el total abans de carregar la vista
        return view('store.cart', compact('cart', 'total'));
    }


    //Actualitzar la cistella (UPDATE)
    public function update(Product $product, $quantity) {
        $cart = \Session::get('cart'); // Recuperem la cistella de la sessió
        $cart[$product->slug]->quantity = $quantity; // Actualitzem la quantitat de l'objecte
        \Session::put('cart', $cart); // Tornem a guardar la cistella actualitzada

        // Redirigim a la vista de la cistella per a mostrar els nous subtotals
        return redirect()->route('cart-show');
    }

    //Càlcul del Total de la cistella (Mètode privat)
    private function total() {
        $cart = \Session::get('cart');
        $total = 0;
        foreach($cart as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }

    //Esborrar un producte i esborrar la cistella (DELETE)
    public function delete(Product $product) {
        $cart = \Session::get('cart'); // Recuperem la cistella
        unset($cart[$product->slug]);  // Eliminem el producte de l'array usant el slug
        \Session::put('cart', $cart);  // Tornem a guardar la cistella actualitzada

        // Redirigim a la vista de la cistella
        return redirect()->route('cart-show');
    }

    public function trash() {
        // Si l'usuari esta amb la sesió iniciada, esborrem la cistella en BD
        if (auth()->check()) {
        $order = \App\Models\Orders::where('user_id', auth()->id())
                    ->where('status', 'cart')
                    ->first();

        if ($order) {
            $order->order_items()->delete(); // elimina productes
        }
    }
    \Session::forget('cart'); // Usem el mètode forget per a eliminar la sessió 'cart'

    // Redirigim a la vista de la cistella, que ara mostrarà que està buida
    return redirect()->route('cart-show');
    }

    //Càlculs de total i subtotal
    public function OrderDetail() {
        // Si la cistella està buida, no deixem veure el detall i tornem al inici
        if (count(\Session::get('cart')) <= 0) {
            return redirect()->route('home');
        }

        // Si hi ha productes, recuperem la cistella i calculem el total
        $cart = \Session::get('cart');
        $total = $this->total();

        // Enviem les dades a la futura vista 'order-detail'
        return view('store.order-detail', compact('cart', 'total'));
    }

}

