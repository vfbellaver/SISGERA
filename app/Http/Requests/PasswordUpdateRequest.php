<?php

namespace Sisgera\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Sisgera\Rules\PasswordAtual;

class PasswordUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
           'password_atual' => ['required', new PasswordAtual],
           'novo_password' => 'required|min:6',
           'confirm_password' => 'required|same:novo_password'
        ];
    }

    public function messages()
    {
        return [
            'password_atual.required' => 'Informe a senha atual.',
            'novo_password.required' => 'Informe a nova senha.',
            'novo_password.min' => 'A nova senha deve conter no minimo 6 caractéres.',
            'confirm_password.required' => 'É necessária a confirmação da nova senha.',
            'confirm_password.same' => 'Confirmação de senha não confere.',
        ];
    }
}
