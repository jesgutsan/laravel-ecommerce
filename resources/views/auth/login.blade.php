@extends('store.template')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="product-block p-4">

                <h2 class="mb-4 text-center">
                    <i class="fa fa-user"></i> Iniciar sessió
                </h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- EMAIL -->
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}"
                            required autofocus>

                        @error('email')
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

                    <!-- REMEMBER -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember">
                        <label class="form-check-label">
                            Recordar-me
                        </label>
                    </div>

                    <!-- BOTÓ -->
                    <button type="submit" class="btn btn-warning w-100">
                        <i class="fa fa-sign-in"></i> Entrar
                    </button>
                    <p class="mt-3 text-center">
                        No tens compte?
                        <a href="{{ route('register') }}">Registra’t</a>
                    </p>

                </form>

            </div>

        </div>

    </div>

</div>


@endsection
