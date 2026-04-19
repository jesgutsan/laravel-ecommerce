<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">Botiga Online</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarAdmin"
            aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Esquerre: Identificació del Backend -->
        <div class="collapse navbar-collapse" id="navbarAdmin">

            <div class="navbar-text mr-3 mb-2 mb-lg-0">
                <i class="fa fa-dashboard"></i> PANELL D'ADMINISTRACIÓ
            </div>

            <a href="{{ route('home') }}" class="btn btn-secondary btn-sm mr-3 mb-2">
                <i class="fa fa-arrow-left"></i> Tornar a la botiga
            </a>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.index') }}">Productes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order.index') }}">Comandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">Usuaris</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        @if(Auth::check())
                            {{ Auth::user()->user }}
                        @else
                            Convidat
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">Tancar sessió</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

