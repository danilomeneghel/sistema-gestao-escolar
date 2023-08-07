@extends('layout')

 @section('titulo', 'Nova Turma')

 @section('content')

  <p class="h2">Nova Turma</p>
  <div class="d-grid gap-2 mb-3 d-md-block">
     <a href="{{route('turmas.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>

  <form method="POST" action="{{route('turmas.store')}}" class="row g-3">
     
    @include('turmas._form')
  
  </form>
 @endsection