<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Lista as Notas
     *
     * @return void
     */
    public function index(Request $request)
    {
        $busca = $request->get('filter');

        if ($busca) {
            $notas = Nota::where([
               ['aprovado', '=', "{$busca}"]
            ])
            ->paginate(10)
            ->withQueryString();
            $total = count($notas);
        }else{
            $notas = Nota::paginate(10);
            $total = Nota::count();
        }

        return view('notas.home', [
            'notas' => $notas,
            'total' => $total
        ])->with('busca', $busca);
    }

    /**
     * Mostra o formulário de criação com a lista de Escolas
     *
     * @return void
     */
    public function create()
    {
        $alunos = Aluno::get();
        $materias = Materia::get();
        $periodos = Periodo::get();

        return view('notas.create',[
            'alunos'=> $alunos,
            'materias'=> $materias,
            'periodos'=> $periodos
        ]);
    }

    /**
     * Cria uma Nota no DB
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $dados = $request->except('_token');

        Nota::create($dados);

        return redirect()->route('notas.index')->with('msg','Nota adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $id
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
        $nota = Nota::findOrFail($id);
        $alunos = Aluno::get();
        $materias = Materia::get();
        $periodos = Periodo::get();

        return view('notas.edit', [
            'nota' => $nota,
            'alunos'=> $alunos,
            'materias'=> $materias,
            'periodos'=> $periodos
        ]);
    }

    /**
     * Atualiza uma Nota no DB
     *
     * @param Integer $id
     * @param Request $request
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $nota = Nota::findOrFail($id);

        $dados = $request->except(['_token', '_method']);

        $nota->update($dados);

        return redirect()->route('notas.index')->with('msg','Nota atualizada com sucesso!');
    }

    /**
     * Deleta uma Nota do DB
     *
     * @param Integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $nota = Nota::findOrFail($id);

        $nota->delete();

        return redirect()->route('notas.index')->with('msg','Nota excluída com sucesso!');
    }
}
