<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MateriaRequest;
use App\Models\Materia;

class MateriaController extends Controller
{
    /**
     * Lista os Materias
     *
     * @return void
     */
    public function index(Request $request)
    {
        $busca = $request->get('search');

        if ($busca) {
            $materias = Materia::where([
               ['nome', 'like', "%{$busca}%"]
            ])
            ->paginate(10)
            ->withQueryString();
        }else{
            $materias = Materia::paginate(10);
        }

        return view('materias.home', [
            'materias' => $materias
        ])->with('busca', $busca);
    }

    /**
     * Mostra o formulário de criação
     *
     * @return void
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Cria uma Materia no DB
     *
     * @param Request $request
     * @return void
     */
    public function store(MateriaRequest $request)
    {
        $dados = $request->except('_token');

        Materia::create($dados);

        return redirect()->route('materias.index')->with('msg','Matéria adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $id
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
        $materia = Materia::findOrFail($id);

        return view('materias.edit', [
            'materia' => $materia
        ]);
    }

    /**
     * Atualiza uma Materia no DB
     *
     * @param Integer $id
     * @param MateriaRequest $request
     * @return void
     */
    public function update(MateriaRequest $request, int $id)
    {
        $materia = Materia::findOrFail($id);

        $dados = $request->except(['_token', '_method']);

        $materia->update($dados);

        return redirect()->route('materias.index')->with('msg','Matéria atualizada com sucesso!');
    }

    /**
     * Deleta uma Materia do DB
     *
     * @param Integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $materia = Materia::findOrFail($id);

        $materia->delete();

        return redirect()->route('materias.index')->with('msg','Matéria excluída com sucesso!');
    }

}
