<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenseUpdateFormRequest extends FormRequest
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
            'license_key' => 'required',
            'license_type' => 'required',
            'license_name' => 'required',
            'license_version' => 'required',
        ];
    }
    public function messages(){
        return [
            'license_key.required' => 'O campo Chave é obrigatório',
            'license_type.required' => 'O campo Tipo é obrigatório',
            'license_name.required' => 'O campo Nome é obrigatório',
            'license_version.required' => 'O campo Versão é obrigatório',
        ];
    }
}
