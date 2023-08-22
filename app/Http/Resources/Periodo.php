<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Periodo extends JsonResource
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
            'tipo' => $this->tipo,
            'periodo' => $this->periodo
        ];
    }
}
