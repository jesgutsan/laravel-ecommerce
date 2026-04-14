@extends('store.template')

@section('content')

@include('store.partials.slider')

<div class="container mt-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach ($products as $product)
            <div class="col mb-4">
                <div class="card h-100 shadow-sm p-3">

                    <img src="{{ $product->image }}"
                        class="card-img-top"
                        alt="producte"
                        style="height: 180px; object-fit: contain;">

                    <div class="card-body text-center d-flex flex-column">

                        <h5 class="card-title">{{ $product->name }}</h5>

                        <p class="card-text">{{ $product->extract }}</p>

                        <p class="fw-bold text-success">
                            {{ number_format($product->price, 2) }} €
                        </p>

                        <div class="mt-auto">
                            <a class="btn btn-warning w-100 mb-2"
                            href="{{ route('cart-add', $product->slug) }}">
                                <i class="fa fa-cart-plus"></i> Afegir
                            </a>

                            <a class="btn btn-outline-primary w-100"
                            href="{{ route('product-detail', $product->slug) }}">
                                Detall
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@stop

