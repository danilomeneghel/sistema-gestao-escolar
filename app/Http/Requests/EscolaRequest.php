<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EscolaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=> ['required', 'max:100'],
            'logradouro'=> ['required', 'max:100'],
            'numero'=> ['required', 'max:20'],
            'bairro'=> ['required', 'max:50'],
            'cidade'=> ['required', 'max:50'],
            'cep'=> ['required', 'max:9'],
            'estado'=> ['required', 'size:2']
        ];
    }
}
