@extends('layout')

 @section('titulo', 'Novo Aluno')

 @section('content')

  <p class="h2">Novo Aluno</p>
  <div class="d-grid gap-2 mb-3 d-md-block">
     <a href="{{route('alunos.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>

  <form method="POST" action="{{route('alunos.store')}}" class="row g-3">
     
    @include('alunos._form')
  
  </form>
 @endsection