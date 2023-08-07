<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlunoRequest;
use App\Http\Resources\Aluno as AlunoResource;
use App\Models\Aluno;

//Class API Alunos
class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::paginate(10);
        return AlunoResource::collection($alunos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\EscolaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        $aluno = new Aluno;
        $aluno->nome = $request-> nome;
        $aluno->email = $request-> email;
        $aluno->telefone = $request-> telefone;
        $aluno->data_nascimento = $request-> data_nascimento;
        $aluno->genero = $request-> genero;

        if($aluno->save()){
            return new AlunoResource( $aluno );
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
        $aluno = Aluno::findOrFail($id);
        return new AlunoResource( $aluno );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\EscolaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlunoRequest $request, $id)
    {
        $aluno = Aluno::findOrFail($id);

        $aluno->nome = $request-> nome;
        $aluno->email = $request-> email;
        $aluno->telefone = $request-> telefone;
        $aluno->data_nascimento = $request-> data_nascimento;
        $aluno->genero = $request-> genero;

        if($aluno->save()){
            return new AlunoResource( $aluno );
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
        $aluno = Aluno::findOrFail($id);
       
        if($aluno->delete() ){
            return new AlunoResource( $aluno );
        }
    }
}
