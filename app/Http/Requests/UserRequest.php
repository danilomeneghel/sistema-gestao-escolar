<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=> ['required', 'max:100'],
            'email'=> ['required','email', 'max:100'],
            'username'=> ['required', 'max:15'],
            'password'=> ['required', 'min:3']
        ];
    }
}
