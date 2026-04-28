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

        <a class="dropdown-item" href="#"
           onclick="event.preventDefault(); document.getElementById('logout-form-store').submit();">
            Tancar sessió
        </a>

        <form id="logout-form-store" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>

    </div>
</li>

@else

<li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">
        <i class="fa fa-user"></i> Inici de sessió
    </a>
</li>

@endif
