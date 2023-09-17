<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeriodoRequest;
use App\Http\Resources\Periodo as PeriodoResource;
use App\Models\Periodo;

//Class API Periodos
class PeriodoController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/periodos",
     *    operationId="periodo/index",
     *    tags={"Periodos"},
     *    summary="Listar Periodos",
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
        $periodos = periodo::paginate(10);
        return periodoResource::collection($periodos);
    }

    /**
     * @OA\Post(
     *      path="/api/periodo",
     *      operationId="periodo/store",
     *      tags={"Periodos"},
     *      summary="Cadastrar Periodo",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"tipo", "periodo"},
     *            @OA\Property(property="tipo", type="string", format="string", example="Bimestre"),
     *            @OA\Property(property="periodo", type="string", format="string", example="Primeiro"),
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
    public function store(PeriodoRequest $request)
    {
        $periodo = new Periodo;
        $periodo->tipo = $request->tipo;
        $periodo->periodo = $request->periodo;

        if($periodo->save()){
            return new PeriodoResource( $periodo );
        }
    }

    /**
     * @OA\Get(
     *    path="/api/periodo/{id}",
     *    operationId="periodo/show",
     *    tags={"Periodos"},
     *    summary="Pesquisar Periodo",
     *    @OA\Parameter(name="id", in="path", description="Id Periodo", required=true,
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
        $periodo = Periodo::findOrFail($id);
        return new PeriodoResource( $periodo );
    }

    /**
     * @OA\Put(
     *     path="/api/periodo/{id}",
     *     operationId="periodo/update",
     *     tags={"Periodos"},
     *     summary="Editar Periodo",
     *     @OA\Parameter(name="id", in="path", description="Id Periodo", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *         @OA\JsonContent(
     *            required={"tipo", "periodo"},
     *            @OA\Property(property="tipo", type="string", format="string", example="Bimestre"),
     *            @OA\Property(property="periodo", type="string", format="string", example="Primeiro"),
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
    public function update(PeriodoRequest $request, $id)
    {
        $periodo = Periodo::findOrFail($id);

        $periodo->tipo = $request->tipo;
        $periodo->periodo = $request->periodo;

        if($periodo->save()){
            return new PeriodoResource( $periodo );
        }
    }

    /**
     * @OA\Delete(
     *    path="/api/periodo/{id}",
     *    operationId="periodo/destroy",
     *    tags={"Periodos"},
     *    summary="Excluir Periodo",
     *    @OA\Parameter(name="id", in="path", description="Id Periodo", required=true,
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
        $periodo = periodo::findOrFail($id);

        if($periodo->delete() ){
            return new periodoResource( $periodo );
        }
    }
}
