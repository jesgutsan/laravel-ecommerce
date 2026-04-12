@extends('admin.template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart"></i> PRODUCTES <small>[Afegir Producte]</small></h1>
    </div>

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="page">
                @include('admin.partials.errors')

                <form action="{{ route('product.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="category_id">Categoria:</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="Nom del producte..." required>
                    </div>

                    <div class="form-group">
                        <label for="extract">Extracte:</label>
                        <input type="text" name="extract" class="form-control"
                               placeholder="Breu resum..." required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripció:</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Preu:</label>
                        <input type="number" step="any" name="price"
                               class="form-control" placeholder="0.00" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Imatge (URL):</label>
                        <input type="text" name="image" class="form-control"
                               placeholder="http://...">
                    </div>

                    <div class="form-group">
                        <label>Visible:</label>
                        <input type="checkbox" name="visible" checked>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Afegir</button>
                        <a href="{{ route('product.index') }}" class="btn btn-warning">
                            Cancel·lar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
