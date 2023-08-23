@extends('layout')

 @section('titulo', 'Editar Escola')

 @section('content')

  <p class="h2">Editar Escola</p><br>

  <form method="POST" action="{{route('escolas.update', $escola)}}" class="row g-3">
    @method('PUT')

    @include('escolas._form')

  </form>
 @endsection
