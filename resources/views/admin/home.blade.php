@extends('admin.template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>BOTIGA LARAVEL - PANELL D'ADMINISTRACIÓ</h1>
    </div>
    <div class="row">
        <!-- Botó per a Categoríes -->
        <div class="col-md-6">
            <div class="panel">
                <i class="fa fa-list-alt icon-home"></i>
                <a href="{{ route('category.index') }}" class="btn btn-warning btn-block btn-home-admin">
                    CATEGORIES
                </a>
            </div>
        </div>

        <!-- Botó per a Productes -->
        <div class="col-md-6">
            <div class="panel">
                <i class="fa fa-shopping-cart icon-home"></i>
                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">
                    PRODUCTES
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <i class="fa fa-cc-paypal icon-home"></i>
                <a href="{{ route('order.index') }}" class="btn btn-warning btn-block btn-home-admin">COMANDES</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <i class="fa fa-users icon-home"></i>
                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIS</a>
            </div>
        </div>
    </div>
</div>
@stop
