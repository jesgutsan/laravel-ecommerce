<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importem totes les classes necessàries de la API de PayPal
use App\Models\Orders;
use App\Models\OrderItems;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
    // Variable per a guardar el context de la connexió a PayPal
    private $_api_context;

    public function __construct()
    {
        // Recuperem la configuració de l'arxiu config/paypal.php
        $paypal_conf = \Config::get('paypal');

        // Configurem les credencials de connexió
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret']
        ));

        // Apliquem els paràmetres de configuració (mode sandbox, logs, etc.)
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /**
     * *Mètode *per a enviar la informació de la comanda a PayPal
     */
    public function postPayment()
    {
        // Configurem el pagador
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // Preparem els ítems de la cistella
        $items = array();
        $subtotal = 0;
        $cart = \Session::get('cart');
        $currency = 'EUR';

        foreach($cart as $producto){
            $item = new Item();
            $item->setName($producto->name)
                ->setCurrency($currency)
                ->setDescription($producto->extract)
                ->setQuantity($producto->quantity)
                // Usem number_format per a assegurar compatibilitat amb la API
                ->setPrice(number_format($producto->price, 2, '.', ''));

            $items[] = $item;
            $subtotal += $producto->quantity * $producto->price;
        }

        // Agrupem els ítems en una llista
        $item_list = new ItemList();
        $item_list->setItems($items);

        // Definim detalls (subtotal + gastos d'enviament)
        $details = new Details();
        $details->setSubtotal(number_format($subtotal, 2, '.', ''))
                ->setShipping(number_format(100, 2, '.', ''));

        // Calculem el total de la factura
        $total = $subtotal + 100;
        $amount = new Amount();
        $amount->setCurrency($currency)
               ->setTotal(number_format($total, 2, '.', ''))
               ->setDetails($details);

        // Cream la transacció
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Comanda de prova en la botiga-Laravel');

        // Definim les URLs de retorn y cancelació
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment.status'))
                      ->setCancelUrl(\URL::route('payment.status'));

        // Creem el objete Payment
        $payment = new Payment();
        $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

        // Executem la transacció amb con PayPal
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                return redirect()->route('cart-show')->with('message', 'Error al connectar amb PayPal');
            }
        }

        // Obtenim l'enllaç de redirecció de PayPal
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // Guardem el ID del pagament en la sesió
        \Session::put('paypal_payment_id', $payment->getId());

        // Redirigim al usuari a la web externa de PayPal
        if(isset($redirect_url)) {
            return \Redirect::away($redirect_url);
        }

        return redirect()->route('cart-show')->with('message', 'Error desconegut.');
    }

    /**
     * Mètode per a recuperar les dades que retorna PayPal
     */
    public function getPaymentStatus(Request $request)
    {
        // Recuperem el ID del pagament y netejem la sesió
        $payment_id = \Session::get('paypal_payment_id');
        \Session::forget('paypal_payment_id');

        // Verifiquem si PayPal ens retorna el PayerID i el token
        $payerId = $request->get('PayerID');
        $token = $request->get('token');

        if (empty($payerId) || empty($token)) {
            return \Redirect::route('home')
                ->with('message', 'Hi ha hagut un problema a l’hora de pagar amb PayPal');
        }

        // Recuperem el pagament i preparem l'execució final
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));

        // Executem el cobrament real
        $result = $payment->execute($execution, $this->_api_context);

        // Verifiquem l'estat del resultat
        if ($result->getState() == 'approved') {
            $this->saveOrder(\Session::get('cart'));  // Guardem la ordre

            \Session::forget('cart'); //  Esborrem la cistella després de la compra
            return \Redirect::route('home')
                ->with('message', 'Compra realitzada correctament. Gràcies per la teua compra!');
        }

        return \Redirect::route('home')
            ->with('message', 'La compra ha sigut cancel·lada');
    }
    // Mètode per a guardar l'orde
    private function saveOrder($cart)
    {
        $subtotal = 0;
        foreach($cart as $item){
            $subtotal += $item->price * $item->quantity;
        }

        // Busquem el cistella actual de l'usuari
        $order = Orders::where('user_id', \Auth::user()->id)
            ->where('status', 'cart')
            ->first();

            // Si no existeix, el creem
        if (!$order) {
            $order = Orders::create([
                'subtotal' => $subtotal,
                'shipping' => 100,
                'user_id' => \Auth::user()->id,
                'status' => 'paid'
            ]);
        } else {
            // Convertim el carret en una compra real
            $order->subtotal = $subtotal;
            $order->shipping = 100;
            $order->status = 'paid';
            $order->save();
        }
        // Eliminem línies anteriors per seguretat
        $order->order_items()->delete();

        // Guardem els articles definitius de la compra
        foreach($cart as $item){
            $this->saveOrderItem($item, $order->id);
        }
    }

    // Mètode per a guardar els articles de l'orde
    private function saveOrderItem($item, $order_id)
    {
        OrderItems::create([
            'quantity' => $item->quantity,
            'price' => $item->price,
            'product_id' => $item->id,
            'order_id' => $order_id
        ]);
    }
}
