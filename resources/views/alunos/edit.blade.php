@extends('layout')

 @section('titulo', 'Editar Aluno')

 @section('content')

  <p class="h2">Editar Aluno</p><br>

  <form method="POST" action="{{route('alunos.update', $aluno)}}" class="row g-3">
    @method('PUT')

    @include('alunos._form')

  </form>
 @endsection
