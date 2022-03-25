<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SoftwareFormRequest extends FormRequest
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
            'software_name' => 'required',
            'software_version' => 'required'
        ];
    }
    public function messages(){
        return[
            'software_name.required' => 'O campo Nome é obrigatorio',
            'software_version.required' => 'O campo versão é obrigatorio',
            'software_active.required' => 'O campo ativo é obrigatório'

        ];
    }
}
