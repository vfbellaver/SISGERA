<?php

namespace Sisgera\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'funcao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe um nome para a conta.',
            'funcao.required' => 'Informe a função.',
        ];
    }
}
