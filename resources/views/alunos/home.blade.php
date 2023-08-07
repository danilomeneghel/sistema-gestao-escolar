@extends('layout')

@section('titulo', 'Alunos')

@section('content')

<p class="h2">Lista de Alunos</p>

  <div class="container">
   <div class="row justify-content-between">
     <div class="col-9">
        <form method="GET" action="{{route('alunos.index')}}" class="row" >
          <div class="col">
            <input type="search" class="form-control" id ="search" name = "search" value="{{$busca}}" placeholder="Buscar Alunos" aria-label="Search">
          </div>
          <div class="col">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
          </div>
        </form>
     </div>
      <div class="col-3">
          <div class="card text-dark bg-info mb-3" style="width: 100%;">
            <div class="card-body">
              <h6 class="card-title">Total de Alunos: {{$total}}</h6>
            </div>
          </div>
      </div>
    </div>
  </div>

  <table class="table table-striped table-hover">
      <thead class="table-primary">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Email</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @if($busca && count($alunos) <= 0 )
        <tr>
          <th ></th>
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
  {{$alunos->links()}}
  <a href="{{route('alunos.create')}}" class="btn btn-primary" role="button">Novo aluno</a>

@endsection