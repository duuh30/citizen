<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitizenRequest extends FormRequest
{

    /**
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
            'name'      => 'required|min:3|max:255',
            'surname'   => 'required|min:3|max:255',
            'cpf'       => 'required|max:14|cpf|formato_cpf|unique:citizens',
            'phone'     => 'required|max:13|telefone_com_ddd',
            'cellphone' => 'required|max:14|celular_com_ddd',
            'email'     => 'required|max:255|email|unique:citizens',
            'zip_code'  => 'required|max:20|formato_cep',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'cpf.formato_cpf'           => 'The cpf field is not in valid format',
            'cpf.cpf'                   => 'The cpf field is invalid',
            'phone.telefone_com_ddd'    => 'The phone field is not in valid ddd format',
            'cellphone.celular_com_ddd' => 'The cellphone field is not in valid ddd format',
            'zip_code.formato_cep'      => 'The zip_code field is not in valid format',
        ];
    }
}
