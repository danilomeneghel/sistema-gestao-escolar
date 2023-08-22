@extends('layout')

@section('titulo', 'Materias')

@section('content')

<p class="h2">Lista de Materias</p>

  <form method="GET" action="{{route('materias.index')}}" class="row g-3 mb-3">
    <div class="col">
      <input type="search" class="form-control" id ="search" name = "search" value="{{$busca}}" placeholder="Buscar Materias" aria-label="Search">
    </div>
    <div class="col">
      <button class="btn btn-outline-primary" type="submit">Buscar</button>
    </div>
  </form>

  <table class="table table-striped table-hover">
      <thead class="table-primary">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @if($busca && count($materias) <= 0 )
        <tr>
          <th></th>
          <td>Nenhum registro encontrado.</td>
          <td></td>
          <td></td>
        </tr>
      @else
        @forelse ($materias as $materia)
          <tr>
            <th scope="row">{{$materia->id}}</th>
            <td>{{$materia->codigo}}</td>
            <td>{{$materia->nome}}</td>
            <td>
              <a href="{{route('materias.edit', $materia)}}" class="btn btn-success">Editar</a>
              <a href="{{route('materias.destroy', $materia)}}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
          </tr>
          @empty
            <tr>
              <th></th>
              <td>Nenhum registro cadastrado.</td>
              <td></td>
              <td></td>
            </tr>
        @endforelse
      @endif
    </tbody>
  </table>
  {{$materias->links()}}
  <a href="{{route('materias.create')}}" class="btn btn-primary" role="button">Nova materia</a>

@endsection
