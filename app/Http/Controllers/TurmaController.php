<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Lista as Turmas
     *
     * @return void
     */
    public function index(Request $request)
    {
        $busca = $request->get('filter');

        if ($busca) {
            $turmas = Turma::where([
               ['nivel', '=', "{$busca}"]
            ])
            ->paginate(10)
            ->withQueryString();
        }else{
            $turmas = Turma::paginate(10); 
        }
        
        return view('turmas.home', [
            'turmas' => $turmas
        ])->with('busca', $busca);
    }

    /**
     * Mostra o formulário de criação com as lista de Escolas
     * 
     * @return void 
     */
    public function create()
    {
        $escolas = Escola::get();

        return view('turmas.create',[
            'escolas'=> $escolas
        ]);
    }

    /**
     * Cria uma Escola no DB
     * 
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $dados = $request->except('_token');

        Turma::create($dados);

        return redirect()->route('turmas.index')->with('msg','Turma adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turma  $id
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
        $turma = Turma::findOrFail($id);
        $escolas = Escola::get();

        return view('turmas.edit', [
            'turma' => $turma,
            'escolas'=> $escolas
        ]);
    }

    /**
     * Atualiza uma Turma no DB
     * 
     * @param Integer $id
     * @param Request $request
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $turma = Turma::findOrFail($id);

        $dados = $request->except(['_token', '_method']);

        $turma->update($dados);

        return redirect()->route('turmas.index')->with('msg','Dados atualizados com sucesso!');
    }

    /**
     * Deleta uma Turma do DB
     * 
     * @param Integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $turma = Turma::findOrFail($id);

        $turma->delete();

        return redirect()->route('turmas.index')->with('msg','Turma excluída com sucesso!');
    }
}
