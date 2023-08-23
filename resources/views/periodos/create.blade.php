@extends('layout')

 @section('titulo', 'Novo Período')

 @section('content')

  <p class="h2">Novo Período</p><br>

  <form method="POST" action="{{route('periodos.store')}}" class="row g-3">

    @include('periodos._form')

  </form>
 @endsection
