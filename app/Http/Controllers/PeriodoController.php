<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PeriodoRequest;
use App\Models\Periodo;

class PeriodoController extends Controller
{
    /**
     * Lista os Periodos
     *
     * @return void
     */
    public function index(Request $request)
    {
        $busca = $request->get('search');

        if ($busca) {
            $periodos = Periodo::where([
               ['nome', 'like', "%{$busca}%"]
            ])
            ->paginate(10)
            ->withQueryString();
            $total = count($periodos);
        }else{
            $periodos = Periodo::paginate(10);
            $total = Periodo::count();
        }

        return view('periodos.home', [
            'periodos' => $periodos,
            'total' => $total
        ])->with('busca', $busca);
    }

    /**
     * Mostra o formulário de criação
     *
     * @return void
     */
    public function create()
    {
        return view('periodos.create');
    }

    /**
     * Cria uma Periodo no DB
     *
     * @param Request $request
     * @return void
     */
    public function store(PeriodoRequest $request)
    {
        $dados = $request->except('_token');

        Periodo::create($dados);

        return redirect()->route('periodos.index')->with('msg','Período adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodo  $id
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
        $periodo = Periodo::findOrFail($id);

        return view('periodos.edit', [
            'periodo' => $periodo
        ]);
    }

    /**
     * Atualiza uma Periodo no DB
     *
     * @param Integer $id
     * @param PeriodoRequest $request
     * @return void
     */
    public function update(PeriodoRequest $request, int $id)
    {
        $periodo = Periodo::findOrFail($id);

        $dados = $request->except(['_token', '_method']);

        $periodo->update($dados);

        return redirect()->route('periodos.index')->with('msg','Período atualizado com sucesso!');
    }

    /**
     * Deleta uma Periodo do DB
     *
     * @param Integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $periodo = Periodo::findOrFail($id);

        $periodo->delete();

        return redirect()->route('periodos.index')->with('msg','Período excluído com sucesso!');
    }

}
