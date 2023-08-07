@extends('layout')

 @section('titulo', 'Editar Aluno')

 @section('content')

  <p class="h2">Novo Aluno</p>
  <div class="d-grid gap-2 mb-3 d-md-block">
     <a href="{{route('alunos.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>

  <form method="POST" action="{{route('alunos.update', $aluno)}}" class="row g-3">
    @method('PUT')
    
    @include('alunos._form')
  
  </form>
 @endsection