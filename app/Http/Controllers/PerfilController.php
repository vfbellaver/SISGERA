<?php

namespace Sisgera\Http\Controllers;

use Illuminate\Http\Request;
use Sisgera\Http\Requests\PasswordUpdateRequest;
use Sisgera\Models\User;

class PerfilController extends Controller
{
    function __construct()
    {

        $this->middleware('auth');
    }

    public function perfilUsuario(){
        $user = User::query()->findOrFail(auth()->user()->id);
        return view('usuario.perfil',compact('user'));
    }

    public function atualizaPassword(PasswordUpdateRequest $request, User $user)
    {
        $data = $request->all();
        $user->password = bcrypt($data['novo_password']);
        $user->save();

        $response = [
            'message' => 'Senha atualizada.',
            'data' => $user,
        ];

        return $response;
    }
}
