@extends('admin.template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-users"></i> USUARIS <small>[Editar Usuari]</small></h1>
    </div>

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="page">
                @include('admin.partials.errors')

                <form action="{{ route('user.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Tipus:</label>
                        <select name="type" class="form-control">
                            <option value="user" {{ $user->type == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Adreça:</label>
                        <textarea name="address" class="form-control">{{ $user->address }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualitzar</button>
                        <a href="{{ route('user.index') }}" class="btn btn-warning">Cancel·lar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
