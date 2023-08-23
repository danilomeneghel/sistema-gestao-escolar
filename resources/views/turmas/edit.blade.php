@extends('layout')

 @section('titulo', 'Editar Turma')

 @section('content')

  <p class="h2">Editar Turma</p><br>

  <form method="POST" action="{{route('turmas.update', $turma)}}" class="row g-3">
    @method('PUT')

    @include('turmas._form')

  </form>
 @endsection
