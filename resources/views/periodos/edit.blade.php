@extends('layout')

 @section('titulo', 'Editar Período')

 @section('content')

  <p class="h2">Editar Período</p><br>

  <form method="POST" action="{{route('periodos.update', $periodo)}}" class="row g-3">
    @method('PUT')

    @include('periodos._form')

  </form>
 @endsection
