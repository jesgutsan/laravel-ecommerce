@extends('store.template')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="product-block p-4">

                <h2 class="mb-4 text-center">
                    <i class="fa fa-user-plus"></i> Registrar-se
                </h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- NOM -->
                    <div class="form-group mb-3">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                    </div>

                    <!-- COGNOMS -->
                    <div class="form-group mb-3">
                        <label>Cognoms</label>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                    </div>

                    <!-- USUARI -->
                    <div class="form-group mb-3">
                        <label>Usuari</label>
                        <input type="text" class="form-control" name="user" value="{{ old('user') }}" required>
                    </div>

                    <!-- EMAIL -->
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>

                    <!-- ADREÇA -->
                    <div class="form-group mb-3">
                        <label>Adreça</label>
                        <textarea class="form-control" name="address" required>{{ old('address') }}</textarea>
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group mb-3">
                        <label>Contrasenya</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <!-- CONFIRM -->
                    <div class="form-group mb-4">
                        <label>Confirmar contrasenya</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <!-- BOTÓ -->
                    <button type="submit" class="btn btn-warning w-100">
                        <i class="fa fa-user-plus"></i> Registrar-se
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
