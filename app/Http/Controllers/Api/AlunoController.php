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
     * @OA\Get(
     *    path="/api/alunos",
     *    operationId="alunos/index",
     *    tags={"Alunos"},
     *    summary="Listar Alunos",
     *    @OA\Parameter(name="limit", in="query", description="limit", required=false,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Parameter(name="page", in="query", description="the page number", required=false,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Parameter(name="order", in="query", description="order  accepts 'asc' or 'desc'", required=false,
     *        @OA\Schema(type="string")
     *    ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function index()
    {
        $alunos = Aluno::paginate(10);
        return AlunoResource::collection($alunos);
    }

    /**
     * @OA\Post(
     *      path="/api/aluno",
     *      operationId="aluno/store",
     *      tags={"Alunos"},
     *      summary="Cadastrar Aluno",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"nome", "telefone", "genero"},
     *            @OA\Property(property="nome", type="string", format="string", example="Aluno Teste"),
     *            @OA\Property(property="email", type="string", format="string", example="teste@teste.com"),
     *            @OA\Property(property="telefone", type="integer", format="integer", example="99999999999"),
     *            @OA\Property(property="data_nascimento", type="integer", format="integer", example="1111-11-11"),
     *            @OA\Property(property="genero", type="string", format="string", example="Masculino"),
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function store(AlunoRequest $request)
    {
        $aluno = new Aluno;
        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->telefone = $request->telefone;
        $aluno->data_nascimento = $request->data_nascimento;
        $aluno->genero = $request->genero;

        if($aluno->save()){
            return new AlunoResource( $aluno );
        }
    }

     /**
     * @OA\Get(
     *    path="/api/aluno/{id}",
     *    operationId="aluno/show",
     *    tags={"Alunos"},
     *    summary="Pesquisar Aluno",
     *    @OA\Parameter(name="id", in="path", description="Id Aluno", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *          @OA\Property(property="status_code", type="integer", example="200"),
     *          @OA\Property(property="data",type="object")
     *           ),
     *        )
     *       )
     *  )
     */
    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        return new AlunoResource( $aluno );
    }

    /**
     * @OA\Put(
     *     path="/api/aluno/{id}",
     *     operationId="aluno/update",
     *     tags={"Alunos"},
     *     summary="Editar Aluno",
     *     @OA\Parameter(name="id", in="path", description="Id Aluno", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *         @OA\JsonContent(
     *            required={"nome", "telefone", "genero"},
     *            @OA\Property(property="nome", type="string", format="string", example="Aluno Teste"),
     *            @OA\Property(property="email", type="string", format="string", example="teste@teste.com"),
     *            @OA\Property(property="telefone", type="integer", format="integer", example="99999999999"),
     *            @OA\Property(property="data_nascimento", type="integer", format="integer", example="1111-11-11"),
     *            @OA\Property(property="genero", type="string", format="string", example="Masculino"),
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function update(AlunoRequest $request, $id)
    {
        $aluno = Aluno::findOrFail($id);

        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->telefone = $request->telefone;
        $aluno->data_nascimento = $request->data_nascimento;
        $aluno->genero = $request->genero;

        if($aluno->save()){
            return new AlunoResource( $aluno );
        }

    }

    /**
     * @OA\Delete(
     *    path="/api/aluno/{id}",
     *    operationId="aluno/destroy",
     *    tags={"Alunos"},
     *    summary="Excluir Aluno",
     *    @OA\Parameter(name="id", in="path", description="Id Aluno", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *         @OA\Property(property="status_code", type="integer", example="200"),
     *         @OA\Property(property="data",type="object")
     *          ),
     *       )
     *      )
     *  )
     */
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);

        if($aluno->delete() ){
            return new AlunoResource( $aluno );
        }
    }
}
