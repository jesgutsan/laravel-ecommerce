@extends('store.template')

@section('content')
<div class="container text-center">

    <div class="page-header">
        <h1><i class="fa fa-shopping-cart"></i> Cistella de compres</h1>
    </div>
    <hr>
    <div class="table-cart">

        @if(count($cart))
        <!-- Botó per a buidar la cistella (A dalt de la graella) -->
         <p>
            <a href="{{ route('cart-trash') }}" class="btn btn-danger">
                Buidar Cistella <i class="fa fa-trash"></i>
            </a>
        </p>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Imatge</th>
                        <th>Producte</th>
                        <th>Preu</th>
                        <th>Quantitat</th>
                        <th>Subtotal</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <!-- Imatge del producte -->
                            <td><img src="{{ $item->image }}" style="width: 50px;"></td>
                            <!-- Nom del producte -->
                            <td>{{ $item->name }}</td>
                            <!-- Preu formatat -->
                            <td>{{ number_format($item->price,2) }}€</td>
                            <!-- Quantitat -->
                            <td>
                                <!-- Camp numèric amb ID únic per a cada producte -->
                                <input
                                    type="number"
                                    min="1"
                                    max="100"
                                    value="{{ $item->quantity }}"
                                    id="product_{{ $item->id }}"
                                >
                                <!-- Botó de refrescar amb atributs data per al JavaScript -->
                                <a
                                    href="#"
                                    class="btn btn-warning btn-update-item"
                                    data-href="{{ route('cart-update', $item->slug) }}"
                                    data-id="{{ $item->id }}"
                                >
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </td>
                            <!-- Càlcul del subtotal -->
                            <td>{{ number_format($item->price * $item->quantity,2) }} €</td>
                            <!-- Botó per a esborrar (encara sense ruta) -->
                            <td>
                                <a href="{{ route('cart-delete', $item->slug) }}" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h3>
                <span class="label label-success">
                    Total: {{ number_format($total, 2) }} €
                </span>
            </h3>
            <hr>
        </div>
        @else
            <h3><span class="label label-danger">La cistella està buida</span></h3>
        @endif

        <p>
            <!-- Botó Seguir Comprant: ens porta al home -->
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fa fa-chevron-circle-left"></i> Seguir comprant
            </a>
             <!-- Botó Continuar: de moment sense ruta (pas següent) -->
            <a href="{{ route('order-detail') }}" class="btn btn-primary">
                Continuar <i class="fa fa-chevron-circle-right"></i>
            </a>
        </p>
    </div>
</div>
@stop
