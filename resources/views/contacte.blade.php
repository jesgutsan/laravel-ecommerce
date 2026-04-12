@extends('store.template')

@section('content')
<div class="container my-5">
  <div class="page">
    <h2>Contacte</h2>
    <p>
      Pots escriure’ns a:
      <strong>chusgutierrez80@gmail.com</strong>
    </p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">
      ← Tornar a la botiga
    </a>
  </div>
</div>
@endsection
