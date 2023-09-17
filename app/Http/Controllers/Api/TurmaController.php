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
     * @OA\Get(
     *    path="/api/turmas",
     *    operationId="turma/index",
     *    tags={"Turmas"},
     *    summary="Listar Turmas",
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
        $turmas = turma::paginate(10);
        return turmaResource::collection($turmas);
    }

    /**
     * @OA\Post(
     *      path="/api/turma",
     *      operationId="turma/store",
     *      tags={"Turmas"},
     *      summary="Cadastrar Turma",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"escola_id", "turno", "serie", "nivel", "ano"},
     *            @OA\Property(property="escola_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="turno", type="string", format="string", example="Manhã"),
     *            @OA\Property(property="serie", type="string", format="string", example="5º"),
     *            @OA\Property(property="nivel", type="string", format="string", example="Fundamental"),
     *            @OA\Property(property="ano", type="integer", format="integer", example="2020"),
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
    public function store(TurmaRequest $request)
    {
        $turma = new Turma;
        $turma->escola_id = $request->escola_id;
        $turma->turno = $request->turno;
        $turma->serie = $request->serie;
        $turma->nivel = $request->nivel;
        $turma->ano = $request->ano;

        if($turma->save()){
            return new TurmaResource( $turma );
        }
    }

    /**
     * @OA\Get(
     *    path="/api/turma/{id}",
     *    operationId="turma/show",
     *    tags={"Turmas"},
     *    summary="Pesquisar Turma",
     *    @OA\Parameter(name="id", in="path", description="Id Turma", required=true,
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
        $turma = Turma::findOrFail($id);
        return new TurmaResource( $turma );
    }

    /**
     * @OA\Put(
     *     path="/api/turma/{id}",
     *     operationId="turma/update",
     *     tags={"Turmas"},
     *     summary="Editar Turma",
     *     @OA\Parameter(name="id", in="path", description="Id Turma", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *         @OA\JsonContent(
     *            required={"escola_id", "turno", "serie", "nivel", "ano"},
     *            @OA\Property(property="escola_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="turno", type="string", format="string", example="Manhã"),
     *            @OA\Property(property="serie", type="string", format="string", example="5º"),
     *            @OA\Property(property="nivel", type="string", format="string", example="Fundamental"),
     *            @OA\Property(property="ano", type="integer", format="integer", example="2020"),
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
    public function update(TurmaRequest $request, $id)
    {
        $turma = Turma::findOrFail($id);

        $turma->escola_id = $request->escola_id;
        $turma->turno = $request->turno;
        $turma->serie = $request->serie;
        $turma->nivel = $request->nivel;
        $turma->ano = $request->ano;

        if($turma->save()){
            return new TurmaResource( $turma );
        }
    }

    /**
     * @OA\Delete(
     *    path="/api/turma/{id}",
     *    operationId="turma/destroy",
     *    tags={"Turmas"},
     *    summary="Excluir Turma",
     *    @OA\Parameter(name="id", in="path", description="Id Turma", required=true,
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
        $turma = turma::findOrFail($id);

        if($turma->delete() ){
            return new turmaResource( $turma );
        }
    }
}
