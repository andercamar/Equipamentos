<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordValidationFormRequest extends FormRequest
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
            'portal'        => 'required|max:255',
            'usuario'       => 'required|max:100',
            'senha'         => 'required|max:100',
        ];
    }

    public function messages(){
        return[
            'portal.required'       => 'O campo portal é obrigatório',
            'usuario.required'      => 'O campo usuario é obrigatório',
            'senha.required'        => 'O campo senha é obrigatório',
        ];
    }
}
