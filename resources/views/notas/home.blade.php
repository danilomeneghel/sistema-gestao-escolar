@extends('layout')

@section('titulo', 'Notas')

@section('content')

<p class="h2">Lista de Notas</p>

  <form method="GET" action="{{route('notas.index')}}" class="row g-3 mb-3">
    <div class="col">
      <input type="search" class="form-control" id ="search" name = "search" value="{{$busca}}" placeholder="Buscar Notas" aria-label="Search">
    </div>
    <div class="col">
      <button class="btn btn-outline-primary" type="submit">Buscar</button>
    </div>
  </form>

  <table class="table table-striped table-hover">
      <thead class="table-primary">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Aluno</th>
        <th scope="col">Matéria</th>
        <th scope="col">Período</th>
        <th scope="col">Nota</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @if($busca && count($notas) <= 0 )
        <tr>
          <th></th>
          <td>Nenhum registro encontrado.</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      @else
        @forelse ($notas as $nota)
        @php
            $aluno = $nota->aluno()->find($nota->aluno_id);
        @endphp
        @php
            $materia = $nota->materia()->find($nota->materia_id);
        @endphp
        @php
            $periodo = $nota->periodo()->find($nota->periodo_id);
        @endphp
          <tr>
            <th scope="row">{{$nota->id}}</th>
            <td>{{$aluno->nome}}</td>
            <td>{{$materia->nome}}</td>
            <td>{{$periodo->periodo}} {{$periodo->tipo}}</td>
            <td>{{$nota->nota}}</td>
            <td>
              <a href="{{route('notas.edit', $nota)}}" class="btn btn-success">Editar</a>
              <a href="{{route('notas.destroy', $nota)}}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
          </tr>
          @empty
            <tr>
              <th></th>
              <td>Nenhum registro cadastrado.</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
        @endforelse
      @endif
    </tbody>
  </table>
  {{$notas->links()}}
  <a href="{{route('notas.create')}}" class="btn btn-primary" role="button">Nova nota</a>

@endsection
