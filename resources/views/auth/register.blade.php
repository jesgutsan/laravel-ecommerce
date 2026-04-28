@extends('store.template')

@section('content')

<div class="container my-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="product-block p-4">

                <h2 class="mb-4 text-center">
                    <i class="fa fa-user-plus"></i> Registrar-se
                </h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        Revisa els errors del formulari
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf

                    <!-- NOM -->
                    <div class="form-group mb-3">
                        <label>Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- COGNOMS -->
                    <div class="form-group mb-3">
                        <label>Cognoms</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                        name="last_name" value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- USUARI -->
                    <div class="form-group mb-3">
                        <label>Usuari</label>
                        <input type="text" class="form-control @error('user') is-invalid @enderror"
                        name="user" value="{{ old('user') }}" required>
                        @error('user')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- EMAIL -->
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- ADREÇA -->
                    <div class="form-group mb-3">
                        <label>Adreça</label>
                        <textarea class="form-control @error('address') is-invalid @enderror"
                        name="address" required>{{ old('address') }}</textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group mb-3">
                        <label>Contrasenya</label>

                        <div style="position: relative;">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" required
                                style="padding-right: 45px;">

                            <button type="button" onclick="togglePassword('password')"
                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
                                    border: none; background: transparent; cursor: pointer;">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>

                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- CONFIRM -->
                    <div class="form-group mb-4">
                        <label>Confirmar contrasenya</label>

                        <div style="position: relative;">
                            <input id="password-confirm" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" required
                                style="padding-right: 45px;">

                            <button type="button" onclick="togglePassword('password-confirm')"
                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
                                    border: none; background: transparent; cursor: pointer;">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>

                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
