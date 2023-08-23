@extends('layout')

@section('titulo', 'Notas')

@section('content')

  <p class="h2">Lista de Notas</p>

  <div class="row my-3">
    <div class="col-7">
        <a href="{{route('notas.create')}}" class="btn btn-primary" role="button">Nova Nota</a>
    </div>
    <div class="col-5">
      <form method="GET" action="{{route('notas.index')}}" class="row">
          <div class="col-9">
            <select id="filter" name="filter" class="form-select">
              <option value="">Selecione</option>
              <option value="Sim">Aprovado</option>
              <option value="Não">Reprovado</option>
            </select>
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
        <th scope="col">Aluno</th>
        <th scope="col">Matéria</th>
        <th scope="col">Período</th>
        <th scope="col">Nota</th>
        <th scope="col">Aprovado</th>
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
            <td>{{$nota->aprovado}}</td>
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
              <td></td>
            </tr>
        @endforelse
      @endif
    </tbody>
  </table>

  <div class="row">
      <div class="col-6 text-start">{{$notas->links()}}</div>
      <div class="col-6 text-end">Total de Registros: {{$total}}</div>
  </div>

@endsection
