@extends('admin.template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>
            <i class="fa fa-users"></i> USUARIS
            <!-- <a href="{{ route('user.create') }}" class="btn btn-warning">
                <i class="fa fa-plus-circle"></i> Nou Usuari
            </a> -->
        </h1>
    </div>

    <div class="page">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Nom</th>
                        <th>Cognoms</th>
                        <th>Email</th>
                        <th>Usuari</th>
                        <th>Tipus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">
                                    <i class="fa fa-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('user.destroy', $user) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger" onClick="return confirm('Eliminar usuari?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->user }}</td>
                            <td>
                                <span class="label {{ $user->type == 'admin' ? 'label-danger' : 'label-info' }}">
                                    {{ strtoupper($user->type) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
