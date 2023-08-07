<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Turma extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'escola_id' => $this->escola_id,
            'turno' => $this->turno,
            'serie' => $this->serie,
            'nivel' => $this->nivel,
            'ano'=> $this->ano
        ];
    }
}
