@extends('layout')

 @section('titulo', 'Editar Nota')

 @section('content')

  <p class="h2">Editar Nota</p><br>

  <form method="POST" action="{{route('notas.update', $nota)}}" class="row g-3">
    @method('PUT')

    @include('notas._form')

  </form>
 @endsection
