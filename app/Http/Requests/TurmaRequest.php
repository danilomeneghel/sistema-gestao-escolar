<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmaRequest extends FormRequest
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
            'turno'=> ['required', 'max:5'],
            'serie'=> ['required', 'max:5'],
            'nivel'=> ['required', 'max:11'],
            'ano'=> ['required', 'size:4']
        ];
    }
}
