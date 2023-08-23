@csrf
  <div class="mb-2 col-md-12">
    <label for="tipo" class="form-label">Tipo*</label>
    <select id="tipo" name="tipo" class="form-select" required>
      <option value="Bimestral">Bimestral</option>
      <option value="Trimestral">Trimestral</option>
      <option value="Semestral">Semestral</option>
    </select>
  </div>
  <div class="mb-2 col-md-12">
    <label for="periodo" class="form-label">Período*</label>
    <select id="periodo" name="periodo" class="form-select" required>
      <option value="Primeiro">Primeiro</option>
      <option value="Segundo">Segundo</option>
      <option value="Terceiro">Terceiro</option>
      <option value="Quarto">Quarto</option>
      <option value="Quinto">Quinto</option>
      <option value="Sexto">Sexto</option>
    </select>
  </div>
  <div class="col-1">
    <a href="{{route('periodos.index')}}" class="btn btn-outline-secondary" role="button">Voltar</a>
  </div>
  <div class="col-1">
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>
