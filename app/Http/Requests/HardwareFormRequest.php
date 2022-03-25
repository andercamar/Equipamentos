<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HardwareFormRequest extends FormRequest
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
            'hardware_type' => 'required',
            'hardware_model' => 'required',
            'hardware_specification' => 'required',
        ];
    }
    public function messages(){
        return[
            'hardware_type.required' => 'O campo tipo é obrigatório',
            'hardware_model.required' => 'O campo modelo é obrigatório',
            'hardware_specification.required' => 'O campo especificação é obrigatório',
        ];
    }
}
