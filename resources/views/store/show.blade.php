@extends('store.template')

@section('content')

<div class="container text-center mt-4">

    <!-- Header -->
    <div class="page-header mb-4">
        <h1>
            <i class="fa fa-shopping-cart"></i> Detall del producte
        </h1>
        <hr>
    </div>

    <!-- Contingut en dos columnes -->
    <div class="row">

        <!-- Columna esquerra: imatge -->
        <div class="col-md-6 mb-4">
            <div class="product-block">
                <img src="{{ $product->image }}" class="img-fluid" alt="producte">
            </div>
        </div>

        <!-- Columna dreta: info -->
        <div class="col-md-6 mb-4">
            <div class="product-block product-info panel">

                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>

                <h3>
                    <span class="badge badge-success p-2">
                        Preu: {{ number_format($product->price, 2) }} €
                    </span>
                </h3>

                <a class="btn btn-warning btn-block" href="{{route('cart-add', $product->slug)}}">
                    Comprar <i class="fa fa-cart-plus fa-2x"></i>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <p class="text-center mt-3">
        <a class="btn btn-primary" href="{{ route('home') }}">
            <i class="fa fa-chevron-circle-right"></i> Tornar
        </a>
    </p>
</div>

@stop

