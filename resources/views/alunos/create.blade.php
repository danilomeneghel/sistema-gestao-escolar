@extends('layout')

 @section('titulo', 'Novo Aluno')

 @section('content')

  <p class="h2">Novo Aluno</p><br>

  <form method="POST" action="{{route('alunos.store')}}" class="row g-3">

    @include('alunos._form')

  </form>
 @endsection
