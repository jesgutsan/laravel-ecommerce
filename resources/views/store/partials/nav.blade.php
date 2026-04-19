<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <!-- Logo -->
    <a class="navbar-brand" href="#">Botiga Online</a>

    <!-- Botó hamburguesa -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarStore">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarStore">

        <!-- Esquerre -->
        <ul class="navbar-nav">

            @php
                $totalItems = 0;
                if (session()->has('cart')) {
                    foreach (session('cart') as $item) {
                        $totalItems += $item->quantity;
                    }
                }
            @endphp

            <li class="nav-item">
                <a class="nav-link" href="{{ route('cart-show') }}">
                    <i class="fa fa-shopping-cart"></i> Cistella ({{ $totalItems }})
                </a>
            </li>

        </ul>

        <!-- Dreta -->
        <ul class="navbar-nav ml-auto align-items-lg-center">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('sobre') }}">Sobre nosaltres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contacte') }}">Contacte</a>
            </li>

            @include('store.partials.menu-user')
        </ul>

    </div>
  </div>
</nav>
