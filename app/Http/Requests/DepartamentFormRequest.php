<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentFormRequest extends FormRequest
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
            'departament_name'=>'required|unique:departaments',
        ];
    }
    public function messages(){
        return[
            'departament_name.required' => 'O campo nome é obrigatório',
            'departament_name.unique' => 'O registro ja esta cadastrado',
        ];
    }

}
