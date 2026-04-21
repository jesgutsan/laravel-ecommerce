@extends('store.template')

@section('content')

@include('store.partials.slider')

<div class="container mt-5">
    <div id="app">

        <input
            type="text"
            class="form-control mb-3"
            placeholder="Buscar producte..."
            v-model="search"
        >

        <select class="form-control mb-4" v-model="selectedCategory">
            <option value="">Totes les categories</option>
            <option
                v-for="category in categories"
                :key="category"
                :value="category"
            >
                @{{ category }}
            </option>
        </select>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach ($products as $product)
                <div class="col mb-4" v-show="matchProduct('{{ strtolower($product->name) }}', '{{ strtolower($product->category->name) }}')">
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
</div>

<script>
    const { createApp } = Vue;

    createApp({
        data() {
            return {
                search: '',
                selectedCategory: '',
                categories: [...new Set([
                    @foreach ($products as $product)
                        '{{ $product->category->name }}',
                    @endforeach
                ])]
            };
        },
        methods: {
            matchProduct(name, category) {
                const matchesSearch = name.toLowerCase().includes(this.search.toLowerCase());
                const matchesCategory =
                    this.selectedCategory === '' ||
                    category.toLowerCase() === this.selectedCategory.toLowerCase();

                return matchesSearch && matchesCategory;
            }
        }

    }).mount('#app');
</script>

@stop
