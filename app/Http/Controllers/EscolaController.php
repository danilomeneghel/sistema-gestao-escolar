<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EscolaRequest;
use App\Models\Escola;

class EscolaController extends Controller
{
    /**
     * Lista as Escolas
     *
     * @return void
     */
    public function index(Request $request)
    {
        $busca = $request->get('search');

        if ($busca) {
            $escolas = Escola::where([
               ['nome', 'like', "%{$busca}%"]
            ])
            ->paginate(10)
            ->withQueryString();
        }else{
            $escolas = Escola::paginate(10); 
        }
        
        return view('escolas.home', [
            'escolas' => $escolas
        ])->with('busca', $busca);
    }

    /**
     * Mostra oo formulário de criação
     * 
     * @return void 
     */
    public function create()
    {
        return view('escolas.create');
    }

    /**
     * Cria uma Escola no DB
     * 
     * @param Request $request
     * @return void
     */
    public function store(EscolaRequest $request)
    {
        $dados = $request->except('_token');

        //Remove caracteres das mascaras
        $dados['cep'] = $this->removeMask($dados['cep']);

        Escola::create($dados);

        return redirect()->route('escolas.index')->with('msg','Escola adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escola  $id
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
        $escola = Escola::findOrFail($id);

        return view('escolas.edit', [
            'escola' => $escola
        ]);
    }

    /**
     * Atualiza uma Escola no DB
     * 
     * @param Integer $id
     * @param EscolaRequest $request
     * @return void
     */
    public function update(EscolaRequest $request, int $id)
    {
        $escola = Escola::findOrFail($id);

        $dados = $request->except(['_token', '_method']);

         //Remove caracteres das mascaras
        $dados['cep'] = $this->removeMask($dados['cep']);


        $escola->update($dados);

        return redirect()->route('escolas.index')->with('msg','Dados atualizados com sucesso!');
    }

    /**
     * Deleta uma Escola do DB
     * 
     * @param Integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $escola = Escola::findOrFail($id);

        $escola->delete();

        return redirect()->route('escolas.index')->with('msg','Escola excluída com sucesso!');
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
