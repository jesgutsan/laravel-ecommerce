@extends('store.template')

@section('content')
<div class="container mt-5">

    <div class="mb-4">
        <h1 class="mb-4">
            <i class="fa fa-shopping-cart"></i> Cistella de compres
        </h1>
    </div>
    <hr>

    <div class="table-cart">

        @if(count($cart))

            <p class="mb-4 text-end">
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
                                <td>
                                    <img src="{{ $item->image }}"
                                         alt="producte"
                                         style="width: 70px; height: 70px; object-fit: contain;">
                                </td>

                                <td>{{ $item->name }}</td>

                                <td>{{ number_format($item->price, 2) }} €</td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <input
                                            type="number"
                                            min="1"
                                            max="100"
                                            value="{{ $item->quantity }}"
                                            id="product_{{ $item->id }}"
                                            class="form-control mr-2"
                                            style="width: 80px;"
                                        >

                                        <a
                                            href="#"
                                            class="btn btn-warning btn-update-item"
                                            data-href="{{ route('cart-update', $item->slug) }}"
                                            data-id="{{ $item->id }}"
                                        >
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </div>
                                </td>

                                <td>{{ number_format($item->price * $item->quantity, 2) }} €</td>

                                <td>
                                    <a href="{{ route('cart-delete', $item->slug) }}" class="btn btn-danger">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-right mt-4">
                    <h3 class="text-success font-weight-bold" style="font-size: 1.8rem;">
                        Total: {{ number_format($total, 2) }} €
                    </h3>
                </div>

                <hr>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary">
                        <i class="fa fa-chevron-circle-left"></i> Seguir comprant
                    </a>

                    <a href="{{ route('order-detail') }}" class="btn btn-success">
                        Continuar <i class="fa fa-chevron-circle-right"></i>
                    </a>
                </div>
            </div>

        @else
            <h3>
                <span class="label label-danger">La cistella està buida</span>
            </h3>

            <p class="mt-4">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i class="fa fa-chevron-circle-left"></i> Seguir comprant
                </a>
            </p>
        @endif

    </div>
</div>
@stop
