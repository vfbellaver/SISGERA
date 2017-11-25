<?php

namespace Sisgera\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequerimentoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome_estudante' => 'required|min:5',
            'curso' => 'required',
            'turma' => 'required|min:4',
            'periodo' => 'required',
            'turno' => 'required',
            'tipos_solicitacao' => 'required',
            'justificativa' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'nome_estudante.required' => 'Informe o nome completo do estudante.',

            'curso.required' => 'Informe o curso do estudante.',
            'turma.required' => 'Informe a turma do estudante.',
            'periodo.required' => 'Informe o periodo do estudante.',
            'turno.required' => 'Informe em qual turno o estudante estuda.',
            'tipos_solicitacao.required' => 'Selecione o tipo do solicitação.',
            'justificativa.required' => 'Justifique sua solicitação.',

        ];
    }
}
