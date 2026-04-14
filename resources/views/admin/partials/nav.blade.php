<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid d-flex align-items-center">

    <!-- Esquerre: Identificació del Backend -->
    <div class="d-flex align-items-center">
      <a class="navbar-brand mb-0" href="#">Botiga Online</a>
      <p class="navbar-text mb-0">
        <i class='fa fa-dashboard'></i> PANELL D'ADMINISTRACIÓ
      </p>
      <a href="{{ route('home') }}" class="btn btn-secondary ml-2">
        <i class="fa fa-arrow-left"></i> Tornar a la botiga
      </a>

    </div>

    <!-- Dreta: Gestió de Recursos -->
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

        <!-- Menú desplegable de l'usuari -->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-user"></i>
                @if(Auth::check())
                    {{ Auth::user()->user }}
                @else
                    Convidat
                @endif
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}">Tancar sessió</a>
                </li>
            </ul>
        </li>
    </ul>

  </div>
</nav>
