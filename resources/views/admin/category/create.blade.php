@extends('admin.template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>
            <i class="fa fa-shopping-cart"></i>
            CATEGORIES <small>Afegir Categoria</small>
        </h1>
    </div>

    <div class="row">
        <!-- Centrem el formulari en 6 columnes -->
        <div class="col-md-offset-3 col-md-6">
            <div class="page">
                <!-- Mostrem els errors de validació si existeixen -->
                 @include('admin.partials.errors')

                <!-- Formulari manual -->
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="Introdueix un nom...">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripció:</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="color">Color:</label>
                        <input type="color" name="color" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Afegir</button>
                        <a href="{{ route('category.index') }}" class="btn btn-warning">
                            Cancel·lar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@stop
