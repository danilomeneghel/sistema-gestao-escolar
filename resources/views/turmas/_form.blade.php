@csrf
  <div class="mb-2 col-md-12">
    <label for="escola" class="form-label">Escola*</label>
    <select id="escola_id" name="escola_id" class="form-select" required >
      <option value="">Selecione a Escola</option>
      @foreach ($escolas as $escola)
        <option value="{{$escola->id}}">{{$escola->nome}}</option>
      @endforeach
  </select>
  </div>
  <div class="mb-2 col-md-3">
    <label for="turno" class="form-label">Turno*</label>
    <select id="turno" name="turno" class="form-select" required>
      <option value="Manhã">Manhã</option>
      <option value="Tarde">Tarde</option>
      <option value="Noite">Noite</option>
  </select>
  </div>
  <div class="mb-2 col-md-3">
    <label for="serie" class="form-label">Serie*</label>
    <input type="text" value="{{ @$turma->serie }}" class="form-control" id="serie" name="serie" placeholder="Ex. 1ª" required maxlength="5">
  </div>
  <div class="mb-2 col-md-3">
    <label for="nivel" class="form-label">Nivel*</label>
    <select id="nivel" name="nivel" class="form-select" required>
      <option value="Fundamental">Fundamental</option>
      <option value="Médio">Médio</option>
    </select>
  </div>
  <div class="mb-2 col-md-3">
    <label for="ano" class="form-label">Ano*</label>
    <input type="text" value="{{ @$turma->ano }}" class="form-control" id="ano" name="ano" placeholder="Ex. 2021"required maxlength="4">
  </div>
  <div class="mb-2 col-md-2">
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>