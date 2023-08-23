@extends('layout')

@section('titulo', 'Periodos')

@section('content')

  <p class="h2">Lista de Períodos</p>

  <div class="row my-3">
    <div class="col-7">
        <a href="{{route('periodos.create')}}" class="btn btn-primary" role="button">Novo Período</a>
    </div>
    <div class="col-5">
      <form method="GET" action="{{route('periodos.index')}}" class="row">
        <div class="col-9">
          <input type="search" class="form-control" id ="search" name = "search" value="{{$busca}}" placeholder="Buscar Período" aria-label="Search">
        </div>
        <div class="col-2">
          <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </div>
      </form>
    </div>
  </div>

  <table class="table table-striped table-hover">
      <thead class="table-primary">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tipo</th>
        <th scope="col">Período</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @if($busca && count($periodos) <= 0 )
        <tr>
          <th></th>
          <td>Nenhum registro encontrado.</td>
          <td></td>
          <td></td>
        </tr>
      @else
        @forelse ($periodos as $periodo)
          <tr>
            <th scope="row">{{$periodo->id}}</th>
            <td>{{$periodo->tipo}}</td>
            <td>{{$periodo->periodo}}</td>
            <td>
              <a href="{{route('periodos.edit', $periodo)}}" class="btn btn-success">Editar</a>
              <a href="{{route('periodos.destroy', $periodo)}}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
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

  <div class="row">
      <div class="col-6 text-start">{{$periodos->links()}}</div>
      <div class="col-6 text-end">Total de Registros: {{$total}}</div>
  </div>

@endsection
