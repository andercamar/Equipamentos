<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrinterFormRequest extends FormRequest
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
            'printer_name'      =>  'required|unique:printers',
            'printer_color'     =>  'required',
            'printer_a3'        =>  'required',
            'printer_value'     =>  'required',
        ];
    }
    public function messages(){
        return[
            'printer_name.required'     =>  'O campo Nome é obrigatório',
            'printer_color.required'    =>  'O campo Colorido é obrigatório',
            'printer_a3.required'       =>  'O campo A3 é obrigatório',
            'printer_value.required'    =>  'O campo Valor é obrigatório',
        ];
    }
}
