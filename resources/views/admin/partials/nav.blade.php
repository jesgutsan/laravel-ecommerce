<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid d-flex align-items-center">

        <a class="btn btn-secondary btn-sm mr-3" href="{{ route('home') }}">
            <i class="fa fa-home"></i> Botiga Online
        </a>

        <a href="{{ route('admin.home') }}" class="nav-link mr-3 p-0">
            <i class="fa fa-dashboard"></i> PANELL D'ADMINISTRACIÓ
        </a>

        <div class="ml-auto dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-user"></i>
                @if(Auth::check())
                    {{ Auth::user()->user }}
                @else
                    Convidat
                @endif
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form-admin').submit();">
                Tancar sessió
                </a>

                <form id="logout-form-admin" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </div>
        </div>

    </div>
</nav>
