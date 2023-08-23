@extends('layout')

 @section('titulo', 'Nova Nota')

 @section('content')

  <p class="h2">Nova Nota</p><br>

  <form method="POST" action="{{route('notas.store')}}" class="row g-3">

    @include('notas._form')

  </form>
 @endsection
