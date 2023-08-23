<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Nota extends JsonResource
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
            'aluno_id' => $this->aluno_id,
            'materia_id' => $this->materia_id,
            'periodo_id' => $this->periodo_id,
            'nota' => $this->nota,
            'aprovado' => $this->aprovado
        ];
    }
}
