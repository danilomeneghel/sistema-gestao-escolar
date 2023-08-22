@extends('layout')

 @section('titulo', 'Nova Nota')

 @section('content')

  <p class="h2">Nova Nota</p>
  <div class="d-grid gap-2 mb-3 d-md-block">
     <a href="{{route('notas.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>

  <form method="POST" action="{{route('notas.store')}}" class="row g-3">

    @include('notas._form')

  </form>
 @endsection
