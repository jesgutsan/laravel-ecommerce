@extends('admin.template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>
            <i class="fa fa-shopping-cart"></i>
            PRODUCTES <small>[Editar Producte]</small>
        </h1>
    </div>

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="page">

                @include('admin.partials.errors')

                <form action="{{ route('product.update', $product->slug) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="category_id">Categoria:</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}"
                                    {{ $product->category_id == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text"
                               name="name"
                               value="{{ $product->name }}"
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="extract">Extracte:</label>
                        <input type="text"
                               name="extract"
                               value="{{ $product->extract }}"
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripció:</label>
                        <textarea name="description"
                                  class="form-control">{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Preu:</label>
                        <input type="number"
                               step="any"
                               name="price"
                               value="{{ $product->price }}"
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="image">Imatge (URL):</label>
                        <input type="text"
                               name="image"
                               value="{{ $product->image }}"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Visible:</label>
                        <input type="checkbox"
                               name="visible"
                               {{ $product->visible ? 'checked' : '' }}>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Actualitzar
                        </button>
                        <a href="{{ route('product.index') }}"
                           class="btn btn-warning">
                            Cancel·lar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@stop
