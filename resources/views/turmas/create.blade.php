@extends('layout')

 @section('titulo', 'Nova Turma')

 @section('content')

  <p class="h2">Nova Turma</p><br>

  <form method="POST" action="{{route('turmas.store')}}" class="row g-3">

    @include('turmas._form')

  </form>
 @endsection
