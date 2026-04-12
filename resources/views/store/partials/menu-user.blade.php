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

        <a class="dropdown-item" href="{{ route('logout') }}">Tancar sessió</a>

    </div>
</li>

@else

<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">
        <i class="fa fa-user"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ route('login') }}">Inici de sessió</a>
        <a class="dropdown-item" href="{{ route('register') }}">Registre</a>
    </div>
</li>

@endif

