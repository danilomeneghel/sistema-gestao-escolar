@extends('layout')

 @section('titulo', 'Nova Escola')

 @section('content')

  <p class="h2">Nova Escola</p>
  <div class="d-grid gap-2 mb-3 d-md-block">
     <a href="{{route('escolas.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>

  <form method="POST" action="{{route('escolas.store')}}" class="row g-3">
     
    @include('escolas._form')
  
  </form>
 @endsection