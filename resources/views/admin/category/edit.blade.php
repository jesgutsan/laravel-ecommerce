@extends('admin.template')
@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart"></i> CATEGORIES <small>[Editar Categoria]</small></h1>
    </div>

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="page">
                @include('admin.partials.errors')

                <form action="{{ route('category.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripció:</label>
                        <textarea name="description" class="form-control" required>{{ $category->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="color">Color:</label>
                        <!-- Recuperem el color manualment -->
                        <input type="color" name="color" value="{{ $category->color }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualitzar</button>
                        <a href="{{ route('category.index') }}" class="btn btn-warning">Cancel·lar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
