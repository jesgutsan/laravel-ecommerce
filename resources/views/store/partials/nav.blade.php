<nav class="navbar navbar-light bg-light">
  <div class="container-fluid d-flex align-items-center">

    <!-- Esquerre -->
    <div class="d-flex align-items-center">
        <a class="navbar-brand mb-0" href="#">Botiga Online</a>

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
    </div>

    <!-- Dreta -->
    <ul class="nav ms-auto align-items-center">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sobre') }}">Sobre nosaltres</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contacte') }}">Contacte</a>
      </li>

      <!-- Menú dinamic -->
       @include('store.partials.menu-user')
    </ul>

  </div>
</nav>
