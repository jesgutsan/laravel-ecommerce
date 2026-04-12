@extends('admin.template')
@section('content')

<div class='container text-center'>
    <div class="page-header">
        <h1>
            <i class='fa fa-shopping-cart'></i> CATEGORIES
            <a href="{{ route('category.create') }}" class='btn btn-warning'>
                <i class='fa fa-plus-circle'></i> Nova Categoria
            </a>
        </h1>
</div>
<div class="page">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Nom</th>
                        <th>Descripció</th>
                        <th>Color</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                <a href="{{ route('category.edit', $category) }}" class="btn btn-primary">
                                    <i class="fa fa-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('category.destroy', $category) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onClick="return confirm('Eliminar registre?')" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <span style="
                                    display:inline-block;
                                    width:20px;
                                    height:20px;
                                    background: {{ $category->color }};
                                    border-radius:4px;
                                    border:1px solid #ccc;
                                    vertical-align:middle;
                                    margin-right:5px;
                                "></span>

                                {{ $category->color }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
