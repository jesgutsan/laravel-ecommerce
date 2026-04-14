@extends('admin.template')

@section('content')
<div class="container">
    <div class="page-header text-center">
        <h1><i class="fa fa-users"></i> USUARIS <small>[Editar Usuari]</small></h1>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="page">
                @include('admin.partials.errors')

                <form action="{{ route('user.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Cognoms:</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="user">Usuari:</label>
                        <input type="text" name="user" value="{{ $user->user }}" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Contrasenya:</label>
                        <input type="password" name="password" class="form-control">
                        <small class="text-info">Deixa el camp en blanc si no vols canviar la contrasenya</small>
                    </div>
                    <br>
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
