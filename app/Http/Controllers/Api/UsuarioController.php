<?php

namespace Sisgera\Http\Controllers\Api;


use Artesaos\Defender\Facades\Defender;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Http\Requests\PasswordUpdateRequest;
use Sisgera\Http\Requests\UserUpdateRequest;
use Sisgera\Http\Requests\UsuarioCreateRequest;
use Sisgera\Models\User;
use Sisgera\Notifications\CadastroUsuario;


class UsuarioController extends Controller
{
    function __construct()
    {

        $this->middleware('auth');
    }

    public function create()
    {
        return view('usuario.criar');
    }


    public function store(UsuarioCreateRequest $request)
    {
        $this->middleware('needsRole:admin|coordenadorcerel,true');
        $data = $request->all();
        $user = new User($data);
        $user->cadastro_token = str_random(128);
        $user->save();

        $user->notify(new CadastroUsuario($user));

        $roleName = $request->input('role');
        $role = Defender::findRole($roleName);
        $user->attachRole($role);

        $data = [
            'message' => 'Usuário ' . $user->name . ' criado com Sucesso!',
            'data' => $user
        ];

        return $data;
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $user = User::query()->findOrFail($id);
        return view('usuario.editar', compact('user'));

    }


    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $data = $request->all();


        $user->update($data);

        $response = [
            'message' => 'Usuário atualizado.',
            'data' => $user
        ];

        return $response;
    }


    public function destroy(User $user)
    {
        $user->delete();
        $message = 'Usuário deletado com sucesso!';

        return [
            'message' => $message
        ];
    }



}
