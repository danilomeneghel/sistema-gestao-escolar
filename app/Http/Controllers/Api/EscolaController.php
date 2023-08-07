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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escolas = Escola ::paginate(10);
        return EscolaResource::collection($escolas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\EscolaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EscolaRequest $request)
    {
        $escola = new Escola;
        $escola->nome = $request-> nome;
        $escola->logradouro = $request-> logradouro;
        $escola->numero = $request-> numero;
        $escola->bairro = $request-> bairro;
        $escola->cidade = $request-> cidade;
        $escola->cep = $request-> cep;
        $escola->estado = $request-> estado;

        if($escola->save()){
            return new EscolaResource( $escola );
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
        $escola = Escola::findOrFail($id);
        return new EscolaResource( $escola );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\EscolaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EscolaRequest $request, $id)
    {
        $escola = Escola::findOrFail($id);

        $escola = new Escola;
        $escola->nome = $request-> nome;
        $escola->logradouro = $request-> logradouro;
        $escola->numero = $request-> numero;
        $escola->bairro = $request-> bairro;
        $escola->cidade = $request-> cidade;
        $escola->cep = $request-> cep;
        $escola->estado = $request-> estado;

        if($escola->save()){
            return new EscolaResource( $escola );
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
        $escola = Escola::findOrFail($id);
       
        if($escola->delete() ){
            return new EscolaResource( $escola );
        }
    }
}
