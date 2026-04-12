@extends('store.template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart"></i> Detall de la comanda</h1>
    </div>

    <div class="page">
        <div class="table-responsive">
            <h3>Dades d'usuari</h3>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <td>Nom:</td>
                    <!-- Combinem nom i cognom de l'usuari autenticat -->
                    <td>{{ Auth::user()->name . " " . Auth::user()->last_name }}</td>
                </tr>
                <tr>
                    <td>Usuari:</td>
                    <td>{{ Auth::user()->user }}</td>
                </tr>
                <tr>
                    <td>Correu:</td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <td>Adreça:</td>
                    <!-- Nota: Fem servir 'address' amb dues 'd' perquè és com ho hem posat en la migració -->
                    <td>{{ Auth::user()->address }}</td>
                </tr>
            </table>
        </div>
        <!-- taula amb els productes  -->
        <div class="table-responsive">
            <h3>Dades de la comanda</h3>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Producte</th>
                        <th>Preu</th>
                        <th>Quantitat</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Recorrem l'array de la cistella enviat des del controlador --}}
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price, 2) }}€</td>
                            <td>{{ $item->quantity }}</td>
                            {{-- Calculem el subtotal de la línia --}}
                            <td>{{ number_format($item->price * $item->quantity, 2) }}€</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Mostrem el total calculat pel controlador --}}
        <h3>
            <span class="label label-success">
                Total: {{ number_format($total, 2) }}€
            </span>
        </h3>
        <hr>

        {{-- Botons d'acció final --}}
        <p>
            {{-- Botó per tornar a la cistella --}}
            <a href="{{ route('cart-show') }}" class="btn btn-primary">
                <i class="fa fa-chevron-circle-left"></i> Tornar a la cistella
            </a>

            {{-- Botó que INICIA el pagament amb PayPal --}}
            <a href="{{ route('payment') }}" class="btn btn-warning">
                Pagar amb <i class="fa fa-cc-paypal fa-2x"></i>
            </a>
        </p>
    </div>
</div>
@stop
