<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'La meva Botiga Laravel')</title>

    <!-- Rutes per al CSS del backend -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>

    <!-- Incluim el missatge de feedback -->
    @if(\Session::has('message'))
        @include('admin.partials.message')
    @endif

    <!-- Canvia a la vista de admin -->
    @include('admin.partials.nav')

    <main>
        <div class="page">
            @yield('content')
        </div>
    </main>

    @include('admin.partials.footer') <!-- Canvia a la vista de admin -->

    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>

</body>
</html>
