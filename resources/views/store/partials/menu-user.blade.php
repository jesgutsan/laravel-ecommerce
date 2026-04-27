@if(Auth::check())
<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">
        <i class="fa fa-user"></i> {{ Auth::user()->user }}
    </a>

    <div class="dropdown-menu dropdown-menu-right">

        @if(Auth::user()->type == 'admin')
            <a class="dropdown-item" href="{{ url('admin/home') }}">Administració</a>
            <div class="dropdown-divider"></div>
        @endif

        @if (Route::has('logout'))
            <a class="dropdown-item" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Tancar sessió
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        @endif

    </div>
</li>

@else

<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">
        <i class="fa fa-user"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-right">

        @if (Route::has('login'))
            <a class="dropdown-item" href="{{ route('login') }}">Inici de sessió</a>
        @endif

        @if (Route::has('register'))
            <a class="dropdown-item" href="{{ route('register') }}">Registre</a>
        @endif

    </div>
</li>

@endif
