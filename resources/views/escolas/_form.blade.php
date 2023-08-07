@csrf
  <div class="mb-2 col-md-12">
    <label for="nome" class="form-label">Nome*</label>
    <input type="text" value="{{ @$escola->nome }}" class="form-control" id="nome" name="nome" placeholder="Nome da escola" required maxlength="100">
  </div>
  <div class="mb-2 col-md-9">
    <label for="logradouro" class="form-label">Logradouro*</label>
    <input type="text" value="{{ @$escola->logradouro }}" class="form-control" id="logradouro" name="logradouro" placeholder="Rua exemplo" required maxlength="100">
  </div>
  <div class="mb-2 col-md-3">
    <label for="numero" class="form-label">Numero*</label>
    <input type="text" value="{{ @$escola->numero }}" class="form-control" id="numero" name="numero" placeholder="999"required maxlength="20">
  </div>
  <div class="mb-2 col-md-3">
    <label for="bairro" class="form-label">Bairro*</label>
    <input type="text" value="{{ @$escola->bairro }}" class="form-control" id="bairro" name="bairro" placeholder="Ex. Centro"required maxlength="50">
  </div>
  <div class="mb-2 col-md-3">
    <label for="cidade" class="form-label">Cidade*</label>
    <input type="text" value="{{ @$escola->cidade }}" class="form-control" id="cidade" name="cidade" placeholder="Ex. Fortaleza"required maxlength="50">
  </div>
  <div class="mb-2 col-md-3">  
    <label for="cep" class="form-label">Cep*</label>
    <input type="text" value="{{ @$escola->cep }}" class="form-control" id="cep" name="cep" placeholder="9999-999" required maxlength="8">
  </div>
  <div class="mb-2 col-md-3">
    <label for="estado" class="form-label">Estado*</label>
    <input type="text" value="{{ @$escola->estado }}" class="form-control" id="estado" name="estado" placeholder="Ex. CE" required maxlength="2">
  </div>
  <div class="mb-2 col-md-2">
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>