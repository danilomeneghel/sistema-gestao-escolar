@extends('layout')

 @section('titulo', 'Nova Matéria')

 @section('content')

  <p class="h2">Nova Matéria</p>
  <div class="d-grid gap-2 mb-3 d-md-block">
     <a href="{{route('materias.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>

  <form method="POST" action="{{route('materias.store')}}" class="row g-3">

    @include('materias._form')

  </form>
 @endsection
