@csrf
  <div class="mb-2 col-md-12">
    <label for="nome" class="form-label">Nome Completo</label>
    <input type="text" value="{{ @$aluno->nome }}" class="form-control" id="nome" name="nome" required maxlength="100">
  </div>
  <div class="mb-2 col-md-12">
    <label for="email" class="form-label">Email</label>
    <input type="email" value="{{ @$aluno->email }}" class="form-control" id="email" name="email" required maxlength="100">
  </div>
  <div class="mb-2 col-md-4">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" value="{{ @$aluno->telefone }}" class="form-control" id="telefone" name="telefone" required maxlength="15">
  </div>
  <div class="mb-2 col-md-4">  
    <label for="data_nascimento" class="form-label">Data Nascimento</label>
    <input type="date" value="{{ @$aluno->data_nascimento }}" class="form-control" id="data_nascimento" name="data_nascimento" required>
  </div>
  <div class="mb-2 col-md-4">
    <label for="genero" class="form-label">Genero</label>
    <input type="text" value="{{ @$aluno->genero }}" class="form-control" id="genero" name="genero" required maxlength="9">
  </div>
  <div class="mb-2 col-md-2">
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>