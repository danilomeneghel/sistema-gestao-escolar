@extends('layout')

 @section('titulo', 'Editar Turma')

 @section('content')

  <p class="h2">Editar Turma</p>
  <div class="d-grid gap-2 mb-3 d-md-block">
     <a href="{{route('turmas.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>

  <form method="POST" action="{{route('turmas.update', $turma)}}" class="row g-3">
    @method('PUT')
    
    @include('turmas._form')
  
  </form>
 @endsection