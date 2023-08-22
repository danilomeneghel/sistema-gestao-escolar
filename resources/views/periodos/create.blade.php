@extends('layout')

 @section('titulo', 'Novo Período')

 @section('content')

  <p class="h2">Novo Período</p>
  <div class="d-grid gap-2 mb-3 d-md-block">
     <a href="{{route('periodos.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>

  <form method="POST" action="{{route('periodos.store')}}" class="row g-3">

    @include('periodos._form')

  </form>
 @endsection
