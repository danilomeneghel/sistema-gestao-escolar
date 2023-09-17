<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotaRequest;
use App\Http\Resources\Nota as NotaResource;
use App\Models\Nota;

//Class API Notas
class NotaController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/notas",
     *    operationId="nota/index",
     *    tags={"Notas"},
     *    summary="Listar Notas",
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
        $notas = nota::paginate(10);
        return notaResource::collection($notas);
    }

    /**
     * @OA\Post(
     *      path="/api/nota",
     *      operationId="nota/store",
     *      tags={"Notas"},
     *      summary="Cadastrar Nota",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"aluno_id", "materia_id", "periodo_id", "nota", "aprovado"},
     *            @OA\Property(property="aluno_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="materia_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="periodo_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="nota", type="integer", format="integer", example="9"),
     *            @OA\Property(property="aprovado", type="string", format="string", example="Sim"),
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
    public function store(NotaRequest $request)
    {
        $nota = new Nota;
        $nota->aluno_id = $request->aluno_id;
        $nota->materia_id = $request->materia_id;
        $nota->periodo_id = $request->periodo_id;
        $nota->nota = $request->nota;
        $nota->aprovado = $request->aprovado;

        if($nota->save()){
            return new NotaResource( $nota );
        }
    }

    /**
     * @OA\Get(
     *    path="/api/nota/{id}",
     *    operationId="nota/show",
     *    tags={"Notas"},
     *    summary="Pesquisar Nota",
     *    @OA\Parameter(name="id", in="path", description="Id Nota", required=true,
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
        $nota = Nota::findOrFail($id);
        return new NotaResource( $nota );
    }

    /**
     * @OA\Put(
     *     path="/api/nota/{id}",
     *     operationId="nota/update",
     *     tags={"Notas"},
     *     summary="Editar Nota",
     *     @OA\Parameter(name="id", in="path", description="Id Nota", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *         @OA\JsonContent(
     *            required={"aluno_id", "materia_id", "periodo_id", "nota", "aprovado"},
     *            @OA\Property(property="aluno_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="materia_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="periodo_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="nota", type="integer", format="integer", example="9"),
     *            @OA\Property(property="aprovado", type="string", format="string", example="Sim"),
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
    public function update(NotaRequest $request, $id)
    {
        $nota = Nota::findOrFail($id);

        $nota->aluno_id = $request->aluno_id;
        $nota->materia_id = $request->materia_id;
        $nota->periodo_id = $request->periodo_id;
        $nota->nota = $request->nota;
        $nota->aprovado = $request->aprovado;

        if($nota->save()){
            return new NotaResource( $nota );
        }
    }

    /**
     * @OA\Delete(
     *    path="/api/nota/{id}",
     *    operationId="nota/destroy",
     *    tags={"Notas"},
     *    summary="Excluir Nota",
     *    @OA\Parameter(name="id", in="path", description="Id Nota", required=true,
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
        $nota = nota::findOrFail($id);

        if($nota->delete() ){
            return new notaResource( $nota );
        }
    }
}
