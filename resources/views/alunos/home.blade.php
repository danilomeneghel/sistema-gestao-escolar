@extends('layout')

@section('titulo', 'Alunos')

@section('content')

  <p class="h2">Lista de Alunos</p>

  <div class="row my-3">
    <div class="col-7">
        <a href="{{route('alunos.create')}}" class="btn btn-primary" role="button">Novo Aluno</a>
    </div>
    <div class="col-5">
        <form method="GET" action="{{route('alunos.index')}}" class="row">
          <div class="col-9">
            <input type="search" class="form-control" id ="search" name = "search" value="{{$busca}}" placeholder="Buscar Aluno" aria-label="Search">
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
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Email</th>
        <th scope="col" class="col-actions">Ações</th>
      </tr>
    </thead>
    <tbody>
      @if($busca && count($alunos) <= 0 )
        <tr>
          <th></th>
          <td>Nenhum registro encontrado.</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      @else
        @forelse ($alunos as $aluno)
          <tr>
            <th scope="row">{{$aluno->id}}</th>
            <td>{{$aluno->nome}}</td>
            <td>{{ \Clemdesign\PhpMask\Mask::apply($aluno->telefone, '(00) 00000-0000')}}</td>
            <td>{{$aluno->email}}</td>
            <td>
              <a href="{{route('alunos.edit', $aluno)}}" class="btn btn-success">Editar</a>
              <a href="{{route('alunos.destroy', $aluno)}}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
          </tr>
          @empty
            <tr>
              <th></th>
              <td>Nenhum registro cadastrado.</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
        @endforelse
      @endif
    </tbody>
  </table>

  <div class="row">
      <div class="col-6 text-start">{{$alunos->links()}}</div>
      <div class="col-6 text-end">Total de Registros: {{$total}}</div>
  </div>

@endsection
