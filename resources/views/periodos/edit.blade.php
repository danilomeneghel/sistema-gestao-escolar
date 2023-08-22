@extends('layout')

 @section('titulo', 'Editar Período')

 @section('content')

  <p class="h2">Editar Período</p>
  <div class="d-grid gap-2 mb-3 d-md-block">
     <a href="{{route('periodos.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>

  <form method="POST" action="{{route('periodos.update', $periodo)}}" class="row g-3">
    @method('PUT')

    @include('periodos._form')

  </form>
 @endsection
