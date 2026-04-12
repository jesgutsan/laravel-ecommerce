@extends('admin.template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart"></i> DETALL DE LA COMANDA #{{ $order->id }}</h1>
    </div>

    <div class="page">
        <div class="table-responsive">
            <h3>Dades de l'Usuari</h3>
            <table class="table table-striped table-hover table-bordered">
                <tr><td>Nom:</td><td>{{ $order->user->name }} {{ $order->user->last_name }}</td></tr>
                <tr><td>Usuari:</td><td>{{ $order->user->user }}</td></tr>
                <tr><td>Correu:</td><td>{{ $order->user->email }}</td></tr>
                <tr><td>Adreça:</td><td>{{ $order->user->address }}</td></tr>
            </table>

            <h3>Dades de la Comanda</h3>
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
                    @foreach($order->order_items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ number_format($item->price, 2) }}€</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price * $item->quantity, 2) }}€</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>
                <span class="label label-success">Total: {{ number_format($order->subtotal + $order->shipping, 2) }}€</span>
            </h3>
        </div>

        <hr>
        <a href="{{ route('order.index') }}" class="btn btn-primary">
            <i class="fa fa-chevron-circle-left"></i> Tornar
        </a>
    </div>
</div>
@stop
