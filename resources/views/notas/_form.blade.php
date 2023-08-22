@csrf
  <div class="mb-2 col-md-12">
      <label for="aluno" class="form-label">Aluno*</label>
      <select id="aluno_id" name="aluno_id" class="form-select" required >
          <option value="">Selecione o Aluno</option>
          @foreach ($alunos as $aluno)
              <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
          @endforeach
      </select>
  </div>
  <div class="mb-2 col-md-12">
    <label for="materia" class="form-label">Matéria*</label>
    <select id="materia_id" name="materia_id" class="form-select" required >
        <option value="">Selecione a Materia</option>
        @foreach ($materias as $materia)
            <option value="{{$materia->id}}">{{$materia->nome}}</option>
        @endforeach
    </select>
  </div>
  <div class="mb-2 col-md-12">
    <label for="periodo" class="form-label">Período*</label>
    <select id="periodo_id" name="periodo_id" class="form-select" required >
        <option value="">Selecione o Período</option>
        @foreach ($periodos as $periodo)
            <option value="{{$periodo->id}}">{{$periodo->periodo}} {{$periodo->tipo}}</option>
        @endforeach
    </select>
  </div>
  <div class="mb-2 col-md-12">
    <label for="nota" class="form-label">Nota*</label>
    <input type="text" value="{{ @$nota->nota }}" class="form-control" id="nota" name="nota" placeholder="Nota" required maxlength="3">
  </div>
  <div class="mb-2 col-md-2">
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>
