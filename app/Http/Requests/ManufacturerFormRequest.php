<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturerFormRequest extends FormRequest
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
            'manufacturer_name' => 'required|unique:manufacturers',
        ];
    }
    public function messages(){
        return [
            'manufacturer_name.required' => 'O campo Nome é obrigatório'
        ];
    }
}
