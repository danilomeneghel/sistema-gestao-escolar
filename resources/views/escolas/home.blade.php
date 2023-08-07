@extends('layout')

@section('titulo', 'Escolas')

@section('content')

<p class="h2">Lista de Escolas</p>

  <form method="GET" action="{{route('escolas.index')}}" class="row g-3 mb-3">
    <div class="col">
      <input type="search" class="form-control" id ="search" name = "search" value="{{$busca}}" placeholder="Buscar Escolas" aria-label="Search">
    </div>
    <div class="col">
      <button class="btn btn-outline-primary" type="submit">Buscar</button>
    </div>
  </form>

  <table class="table table-striped table-hover">
      <thead class="table-primary">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Cidade</th>
        <th scope="col">Cep</th>
        <th scope="col">Estado</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @if($busca && count($escolas) <= 0 )
        <tr>
          <th ></th>
          <td>Nenhum registro encontrado.</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      @else
        @forelse ($escolas as $escola)
          <tr>
            <th scope="row">{{$escola->id}}</th>
            <td>{{$escola->nome}}</td>
            <td>{{$escola->cidade}}</td>
            <td>{{ \Clemdesign\PhpMask\Mask::apply($escola->cep, '00000-000')}}</td>
            <td>{{$escola->estado}}</td>
            <td>
              <a href="{{route('escolas.edit', $escola)}}" class="btn btn-success">Editar</a>
              <a href="{{route('escolas.destroy', $escola)}}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
          </tr>
          @empty
            <tr>
              <th ></th>
              <td>Nenhum registro cadastrado.</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
        @endforelse
      @endif
    </tbody>
  </table>
  {{$escolas->links()}}
  <a href="{{route('escolas.create')}}" class="btn btn-primary" role="button">Nova escola</a>

@endsection