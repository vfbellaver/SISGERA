<?php

namespace Sisgera\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:contas',
            'funcao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe um nome para a conta.',
            'name.unique' => 'Já existe uma conta com esse nome.',
            'funcao.required' => 'Informe a função.',
        ];
    }
}
