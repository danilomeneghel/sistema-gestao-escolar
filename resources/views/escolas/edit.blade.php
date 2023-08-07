@extends('layout')

 @section('titulo', 'Editar Escola')

 @section('content')

  <p class="h2">Novo Escola</p>
  <div class="d-grid gap-2 mb-3 d-md-block">
     <a href="{{route('escolas.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>

  <form method="POST" action="{{route('escolas.update', $escola)}}" class="row g-3">
    @method('PUT')
    
    @include('escolas._form')
  
  </form>
 @endsection