<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Lista os Alunos
     *
     * @return void
     */
    public function index(Request $request)
    {
        
        $total = Aluno::count();

        $busca = $request->get('search');

        if ($busca) {
            $alunos = Aluno::where([
               ['nome', 'like', "%{$busca}%"]
            ])
            ->paginate(10)
            ->withQueryString();
        }else{
            $alunos = Aluno::paginate(10); 
        }
        
        return view('alunos.home', [
            'alunos' => $alunos,
            'total' => $total,
        ])->with('busca', $busca);
    }

    /**
     * Mostra oo formulário de criação
     * 
     * @return void 
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Cria um Aluno no DB
     * 
     * @param Request $request
     * @return void
     */
    public function store(AlunoRequest $request)
    {
        $dados = $request->except('_token');

        //Remove caracteres das mascaras
        $dados['telefone'] = $this->removeMask($dados['telefone']);

        Aluno::create($dados);

        return redirect()->route('alunos.index')->with('msg','Aluno adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Mostra o formulário de edição populado
     * 
     * @param Integer $id
     * @return void
     */
    public function edit(int $id)
    {
        $aluno = Aluno::findOrFail($id);

        return view('alunos.edit', [
            'aluno' => $aluno
        ]);
    }

    /**
     * Atualiza um Aluno no DB
     * 
     * @param Integer $id
     * @param Request $request
     * @return void
     */
    public function update(AlunoRequest $request, int $id)
    {
        $aluno = Aluno::findOrFail($id);

        $dados = $request->except(['_token', '_method']);

         //Remove caracteres das mascaras
        $dados['telefone'] = $this->removeMask($dados['telefone']);


        $aluno->update($dados);

        return redirect()->route('alunos.index')->with('msg','Dados atualizados com sucesso!');
    }

    /**
     * Deleta um aluno do DB
     * 
     * @param Integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $aluno = Aluno::findOrFail($id);

        $aluno->delete();

        return redirect()->route('alunos.index')->with('msg','Aluno excluído com sucesso!');

    }

    /**
     * Remove os caracteres das mascaras cep e telefone
     * 
     * @param string $data
     * @return string
     */
    protected function removeMask(string $data)
    {
        return $data = str_replace(['.','-','(',')',' '], '',$data);
    }
}
