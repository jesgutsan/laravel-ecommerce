@extends('store.template')

@section('content')

<div class="container mt-5" style="max-width: 1100px;">

    <!-- Header -->
    <div class="row align-items-start">
        <!-- Image -->
        <div class="col-md-6">
            <div class="card shadow-sm p-4 text-center overflow-hidden">
                <img src="{{ $product->image }}" class="img-fluid product-detail-img" alt="producte" style="height: 420px; object-fit: contain;">
            </div>
        </div>

        <!-- Informació -->
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h2 class="mb-3">{{ $product->name }}</h2>

                <p class="text-secondary">{{ $product->description }}</p>

                <h3 class="text-success font-weight-bold mb-4">
                    {{ number_format($product->price, 2) }} €
                </h3>

                <a class="btn btn-warning btn-lg w-100 mb-3" href="{{ route('cart-add', $product->slug) }}">
                    <i class="fa fa-cart-plus"></i> Afegir a la cistella
                </a>

                <a class="btn btn-outline-primary btn-sm" href="{{ route('home') }}">
                    <i class="fa fa-arrow-left"></i> Tornar
                </a>
            </div>
        </div>

    </div>
</div>

@stop

