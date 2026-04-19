@extends('store.template')

@section('content')
<div class="container my-5">
  <div class="page">
    <h2>Sobre nosaltres</h2>

    <p>
      Aquesta és la meua botiga online.
      Treballe amb productes de qualitat i atenció personalitzada.
    </p>

    <!-- REDES SOCIALES -->
    <div class="text-center mt-4">
      <h3>Segueix-nos</h3>

      <ul class="xarxes">
        <li><a href="#"><i class="fa fa-facebook-square fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter-square fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube-square fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
      </ul>
    </div>

    <a href="{{ url('/') }}" class="btn btn-primary mt-3">
      ← Tornar a la botiga
    </a>
  </div>
</div>
@endsection
