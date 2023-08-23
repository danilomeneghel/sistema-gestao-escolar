@csrf
  <div class="mb-2 col-md-4">
    <label for="codigo" class="form-label">Código</label>
    <input type="text" value="{{ @$materia->codigo }}" class="form-control" id="codigo" name="codigo" placeholder="Código" required maxlength="10">
  </div>
  <div class="mb-2 col-md-12">
    <label for="nome" class="form-label">Nome*</label>
    <input type="text" value="{{ @$materia->nome }}" class="form-control" id="nome" name="nome" placeholder="Nome da Matéria" required maxlength="20">
  </div>
  <div class="col-1">
    <a href="{{route('materias.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>
  <div class="col-1">
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>
