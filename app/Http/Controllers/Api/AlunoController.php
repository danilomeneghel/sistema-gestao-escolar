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
     *            required={"title", "content", "status"},
     *            @OA\Property(property="title", type="string", format="string", example="Test Article Title"),
     *            @OA\Property(property="content", type="string", format="string", example="This is a description for kodementor"),
     *            @OA\Property(property="status", type="string", format="string", example="Published"),
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
     * @OA\Get(
     *    path="/api/aluno/{id}",
     *    operationId="aluno/show",
     *    tags={"Alunos"},
     *    summary="Pesquisar Aluno",
     *    @OA\Parameter(name="id", in="path", description="Id of Article", required=true,
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
     *     description="Update article in DB",
     *     @OA\Parameter(name="id", in="path", description="Id of Article", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(
     *           required={"title", "content", "status"},
     *           @OA\Property(property="title", type="string", format="string", example="Test Article Title"),
     *           @OA\Property(property="content", type="string", format="string", example="This is a description for kodementor"),
     *           @OA\Property(property="status", type="string", format="string", example="Published"),
     *        ),
     *     ),
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
     * @OA\Delete(
     *    path="/api/aluno/{id}",
     *    operationId="aluno/destroy",
     *    tags={"Alunos"},
     *    summary="Excluir Aluno",
     *    @OA\Parameter(name="id", in="path", description="Id of Article", required=true,
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
