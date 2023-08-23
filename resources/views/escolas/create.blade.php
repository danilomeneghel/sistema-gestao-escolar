@extends('layout')

 @section('titulo', 'Nova Escola')

 @section('content')

  <p class="h2">Nova Escola</p><br>

  <form method="POST" action="{{route('escolas.store')}}" class="row g-3">

    @include('escolas._form')

  </form>
 @endsection
