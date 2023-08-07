<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TurmaRequest;
use App\Http\Resources\Turma as TurmaResource;
use App\Models\Turma;

//Class API Turmas
class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = turma::paginate(10);
        return turmaResource::collection($turmas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\EscolaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurmaRequest $request)
    {
        $turma = new Turma;
        $turma->escola_id = $request-> escola_id;
        $turma->turno = $request-> turno;
        $turma->serie = $request-> serie;
        $turma->nivel = $request-> nivel;
        $turma->ano = $request-> ano;

        if($turma->save()){
            return new TurmaResource( $turma );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turma = Turma::findOrFail($id);
        return new TurmaResource( $turma );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\EscolaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TurmaRequest $request, $id)
    {
        $turma = Turma::findOrFail($id);

        $turma->escola_id = $request-> escola_id;
        $turma->turno = $request-> turno;
        $turma->serie = $request-> serie;
        $turma->nivel = $request-> nivel;
        $turma->ano = $request-> ano;

        if($turma->save()){
            return new TurmaResource( $turma );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = turma::findOrFail($id);
       
        if($turma->delete() ){
            return new turmaResource( $turma );
        }
    }
}
