<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MateriaRequest;
use App\Http\Resources\Materia as MateriaResource;
use App\Models\Materia;

//Class API Materias
class MateriaController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/materias",
     *    operationId="materia/index",
     *    tags={"Materias"},
     *    summary="Listar Materias",
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
        $materias = materia::paginate(10);
        return materiaResource::collection($materias);
    }

    /**
     * @OA\Post(
     *      path="/api/materia",
     *      operationId="materia/store",
     *      tags={"Materias"},
     *      summary="Cadastrar Materia",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"codigo"},
     *            @OA\Property(property="codigo", type="integer", format="integer", example="1"),
     *            @OA\Property(property="nome", type="string", format="string", example="Matéria Teste"),
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
    public function store(MateriaRequest $request)
    {
        $materia = new Materia;
        $materia->codigo = $request->codigo;
        $materia->nome = $request->nome;

        if($materia->save()){
            return new MateriaResource( $materia );
        }
    }

    /**
     * @OA\Get(
     *    path="/api/materia/{id}",
     *    operationId="materia/show",
     *    tags={"Materias"},
     *    summary="Pesquisar Materia",
     *    @OA\Parameter(name="id", in="path", description="Id Materia", required=true,
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
        $materia = Materia::findOrFail($id);
        return new MateriaResource( $materia );
    }

    /**
     * @OA\Put(
     *     path="/api/materia/{id}",
     *     operationId="materia/update",
     *     tags={"Materias"},
     *     summary="Editar Materia",
     *     @OA\Parameter(name="id", in="path", description="Id Materia", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *         @OA\JsonContent(
     *            required={"codigo"},
     *            @OA\Property(property="codigo", type="integer", format="integer", example="1"),
     *            @OA\Property(property="nome", type="string", format="string", example="Matéria Teste"),
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
    public function update(MateriaRequest $request, $id)
    {
        $materia = Materia::findOrFail($id);

        $materia->codigo = $request->codigo;
        $materia->nome = $request->nome;

        if($materia->save()){
            return new MateriaResource( $materia );
        }
    }

    /**
     * @OA\Delete(
     *    path="/api/materia/{id}",
     *    operationId="materia/destroy",
     *    tags={"Materias"},
     *    summary="Excluir Materia",
     *    @OA\Parameter(name="id", in="path", description="Id Materia", required=true,
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
        $materia = materia::findOrFail($id);

        if($materia->delete() ){
            return new materiaResource( $materia );
        }
    }
}
