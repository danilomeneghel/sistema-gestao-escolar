@extends('layout')

 @section('titulo', 'Editar Matéria')

 @section('content')

  <p class="h2">Editar Matéria</p><br>

  <form method="POST" action="{{route('materias.update', $materia)}}" class="row g-3">
    @method('PUT')

    @include('materias._form')

  </form>
 @endsection
