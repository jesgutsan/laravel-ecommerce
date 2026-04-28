@extends('admin.template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-cc-paypal"></i> COMANDES</h1>
    </div>

    <div class="page">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Veure</th>
                        <th>Eliminar</th>
                        <th>Data i Hora</th>
                        <th>Usuari</th>
                        <th>Subtotal</th>
                        <th>Enviament</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>
                                <!-- Botó per vore el detall de la comanda -->
                                <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('order.destroy', $order) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger" onClick="return confirm('Eliminar comanda?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $order->created_at->setTimezone('Europe/Madrid')->format('d/m/Y H:i') }}</td>
                            <td>{{ $order->user->name }} {{ $order->user->last_name }}</td>
                            <td>{{ number_format($order->subtotal, 2) }}€</td>
                            <td>{{ number_format($order->shipping, 2) }}€</td>
                            <td>{{ number_format($order->subtotal + $order->shipping, 2) }}€</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
