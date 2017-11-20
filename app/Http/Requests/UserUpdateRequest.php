<?php

namespace Sisgera\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $id = request('id');
        return [
            'name'=> 'required',
            'email' => "required|email|min:5|unique:users,{$id}",
            'rg' => 'required|unique:users',
            'org_emissor' => 'required',
            'cpf' => 'required|unique:users',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe o nome completo.',

            'email.required' => 'Informe um endereco de email.',
            'email.email' => 'Informe um endereco de email válido.',
            'email.unique' => 'Já existe este endereco de email.',

            'rg.required' => 'Informe um número de Registro Geral.',
            'rg.unique' => 'Já existe este número de Registro Geral.',

            'org_emissor.required' => 'Informe um orgão emissor para o RG.',

            'cpf.required' => 'Informe o número de CPF.',
            'cpf.unique' => 'Número de CPF existente.',

            'role.required' => 'Selecione o tipo de usuário.',

        ];
    }
}
