<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserFormRequest extends FormRequest
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
            'name'      => 'required|string|max:255',
            'email'     => "required|string|email|max:255|unique:users",
            'password'  => 'required',
        ];
    }
    public function messages(){
        return[
            'name.required' => 'O campo nome é obrigatorio',
            'email.required' => 'O campo email é obrigatorio',
            'password.required' => 'O campo senha é obrigatorio',
            'email.unique' => 'O email ja esta cadastrado',
        ];
    }
}
