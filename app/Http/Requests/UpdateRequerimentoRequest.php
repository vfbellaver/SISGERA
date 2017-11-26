<?php

namespace Sisgera\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequerimentoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'resposta' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'resposta.required' => 'Por favor justifique a sua decisão.'
        ];
    }
}
