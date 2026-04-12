@extends('store.template')

@section('content')

@include('store.partials.slider')

<div class="container mt-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        @foreach ($products as $product)
            <div class="col mb-4">
                <div class="product-block shadow-sm h-100 text-center"
                    style="background: white; border-radius: 8px; padding: 20px;">

                    <h3>{{ $product->name }}</h3>

                    <img src="{{ $product->image }}"
                        class="img-fluid mb-3"
                        alt="producte"
                        style="max-height: 200px;">

                    <div class="product-info">
                        <p>{{ $product->extract }}</p>

                        <span class="badge badge-success mb-3" style="font-size: 1.2rem;">
                            Preu: {{ number_format($product->price, 2) }} €
                        </span>

                        <div class="d-flex justify-content-center">
                            <a class="btn btn-warning mr-2"
                            href="{{ route('cart-add', $product->slug) }}">
                                <i class="fa fa-cart-plus"></i> Comprar
                            </a>

                            <a class="btn btn-primary"
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

