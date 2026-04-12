@extends('store.template')

@section('content')
<div class="container my-5">
  <div class="page">
    <h2>Sobre nosaltres</h2>
    <p>
      Aquesta és la meua botiga Laravel.
      Treballe amb productes de qualitat i atenció personalitzada.
    </p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">
      ← Tornar a la botiga
    </a>
  </div>
</div>
@endsection
