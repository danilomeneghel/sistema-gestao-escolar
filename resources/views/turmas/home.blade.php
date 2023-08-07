@extends('layout')

@section('titulo', 'Turmas')

@section('content')

<p class="h2">Lista de Turmas</p>

  <form method="GET" action="{{route('turmas.index')}}" class="row g-3 mb-3">
    <div class="col-md-2">
      <select id="filter" name="filter" class="form-select">
        <option value="">Selecione</option>
        <option value="Fundamental">Fundamental</option>
        <option value="Médio">Médio</option>
      </select>
    </div>
    <div class="col-md-2">
      <button class="btn btn-outline-primary" type="submit">Buscar</button>
    </div>
  </form>

  <table class="table table-striped table-hover">
      <thead class="table-primary">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Escola</th>
        <th scope="col">Turno</th>
        <th scope="col">Série</th>
        <th scope="col">Nível</th>
        <th scope="col">Ano</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @if($busca && count($turmas) <= 0 )
        <tr>
          <th ></th>
          <td>Nenhum registro encontrado.</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      @else
        @forelse ($turmas as $turma)
          @php
              $escola = $turma->escola()->find($turma->escola_id);
          @endphp
          <tr>
            <th scope="row">{{$turma->id}}</th>
            <td>{{$escola->nome}}</td>
            <td>{{$turma->turno}}</td>
            <td>{{$turma->serie}}</td>
            <td>{{$turma->nivel}}</td>
            <td>{{$turma->ano}}</td>
            <td>
              <a href="{{route('turmas.edit', $turma)}}" class="btn btn-success">Editar</a>
              <a href="{{route('turmas.destroy', $turma)}}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
          </tr>
          @empty
            <tr>
              <th ></th>
              <td>Nenhum registro cadastrado.</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
        @endforelse
      @endif
    </tbody>
  </table>
  {{$turmas->links()}}
  <a href="{{route('turmas.create')}}" class="btn btn-primary" role="button">Nova turma</a>

@endsection