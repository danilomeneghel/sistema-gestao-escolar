@extends('layout')

 @section('titulo', 'Nova Matéria')

 @section('content')

  <p class="h2">Nova Matéria</p><br>

  <form method="POST" action="{{route('materias.store')}}" class="row g-3">

    @include('materias._form')

  </form>
 @endsection
