<?php

namespace Sisgera\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterInvitationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Informe uma senha.',
            'password.min' => 'A senha deve conter no minimo 6 caractéres.',
            'confirm_password.required' => 'É necessária a confirmação da nova senha.',
            'confirm_password.same' => 'Confirmação de senha não confere.',
        ];
    }
}
