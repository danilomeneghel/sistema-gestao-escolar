<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EscolaRequest;
use App\Http\Resources\Escola as EscolaResource;
use App\Models\Escola;

//Class API Escolas
class EscolaController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/escolas",
     *    operationId="escola/index",
     *    tags={"Escolas"},
     *    summary="Listar Escolas",
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
        $escolas = Escola ::paginate(10);
        return EscolaResource::collection($escolas);
    }

    /**
     * @OA\Post(
     *      path="/api/escola",
     *      operationId="escola/store",
     *      tags={"Escolas"},
     *      summary="Cadastrar Escola",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"title", "content", "status"},
     *            @OA\Property(property="nome", type="string", format="string", example="Escola Teste"),
     *            @OA\Property(property="logradouro", type="string", format="string", example="Logradouro Teste"),
     *            @OA\Property(property="numero", type="integer", format="integer", example="99"),
     *            @OA\Property(property="bairro", type="string", format="string", example="Bairro Teste"),
     *            @OA\Property(property="cidade", type="string", format="string", example="Cidade Teste"),
     *            @OA\Property(property="cep", type="integer", format="integer", example="99999999"),
      *            @OA\Property(property="estado", type="string", format="string", example="SP"),
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
    public function store(EscolaRequest $request)
    {
        $escola = new Escola;
        $escola->nome = $request->nome;
        $escola->logradouro = $request->logradouro;
        $escola->numero = $request->numero;
        $escola->bairro = $request->bairro;
        $escola->cidade = $request->cidade;
        $escola->cep = $request->cep;
        $escola->estado = $request->estado;

        if($escola->save()){
            return new EscolaResource( $escola );
        }
    }

    /**
     * @OA\Get(
     *    path="/api/escola/{id}",
     *    operationId="escola/show",
     *    tags={"Escolas"},
     *    summary="Pesquisar Escola",
     *    @OA\Parameter(name="id", in="path", description="Id Escola", required=true,
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
        $escola = Escola::findOrFail($id);
        return new EscolaResource( $escola );
    }

    /**
     * @OA\Put(
     *     path="/api/escola/{id}",
     *     operationId="escola/update",
     *     tags={"Escolas"},
     *     summary="Editar Escola",
     *     @OA\Parameter(name="id", in="path", description="Id Escola", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *         @OA\JsonContent(
     *            required={"title", "content", "status"},
     *            @OA\Property(property="nome", type="string", format="string", example="Escola Teste"),
     *            @OA\Property(property="logradouro", type="string", format="string", example="Logradouro Teste"),
     *            @OA\Property(property="numero", type="integer", format="integer", example="99"),
     *            @OA\Property(property="bairro", type="string", format="string", example="Bairro Teste"),
     *            @OA\Property(property="cidade", type="string", format="string", example="Cidade Teste"),
     *            @OA\Property(property="cep", type="integer", format="integer", example="99999999"),
      *            @OA\Property(property="estado", type="string", format="string", example="SP"),
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
    public function update(EscolaRequest $request, $id)
    {
        $escola = Escola::findOrFail($id);

        $escola = new Escola;
        $escola->nome = $request->nome;
        $escola->logradouro = $request->logradouro;
        $escola->numero = $request->numero;
        $escola->bairro = $request->bairro;
        $escola->cidade = $request->cidade;
        $escola->cep = $request->cep;
        $escola->estado = $request->estado;

        if($escola->save()){
            return new EscolaResource( $escola );
        }
    }

    /**
     * @OA\Delete(
     *    path="/api/escola/{id}",
     *    operationId="escola/destroy",
     *    tags={"Escolas"},
     *    summary="Excluir Escola",
     *    @OA\Parameter(name="id", in="path", description="Id Escola", required=true,
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
        $escola = Escola::findOrFail($id);

        if($escola->delete() ){
            return new EscolaResource( $escola );
        }
    }
}
