<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerUpdateFormRequest extends FormRequest
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
            'computer_patrimony' => 'required',
            'computer_name' => 'required',
            'computer_user' => 'required',
            'computer_purchase' => 'required',
            'computer_invoice' => 'required',
            'departament_id' => 'required',
            'model_id' => 'required',
            'vendor_id' => 'required',
            'motherboard_id' => 'required',
            'memory_id' => 'required',
            'processor_id' => 'required',
            'storage_id' => 'required',
            'system_id' => 'required',
            'office_id' => 'required',
        ];
    }
    public function messages(){
        return [
            'computer_patrimony.required' => 'O campo Patrimonio é obrigatório',
            'computer_name.required' => 'O campo Nome é obrigatório',
            'computer_user.required' => 'O campo Usuario é obrigatório',
            'computer_purchase.required' => 'O campo Data de Compra é obrigatório',
            'computer_invoice.required' => 'O campo Nota fiscal é obrigatório',
            'departament_id.required' => 'O campo Departamento é obrigatório',
            'model_id.required' => 'O campo Modelo é obrigatório',
            'vendor_id.required' => 'O campo Fornecedor é obrigatório',
            'motherboard_id.required' => 'O campo Placa Mãe é obrigatório',
            'memory_id.required' => 'O campo Memoria é obrigatório',
            'processor_id.required' => 'O campo Processador é obrigatório',
            'storage_id.required' => 'O campo Armazenamento é obrigatório',
            'system_id.required' => 'O campo Sistema operacional é obrigatório',
            'office_id.required' => 'O campo Office é obrigatório',
        ];
    }
}
