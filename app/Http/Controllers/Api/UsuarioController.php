<?php

namespace Sisgera\Http\Controllers\Api;

use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Http\Requests\UsuarioCreateRequest;
use Sisgera\User;

class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('needsRole:admin');
    }

    public function create()
    {
        return view('usuario.criar');
    }


    public function store(UsuarioCreateRequest $request)
    {
        $data = $request->all();
        $user = new User($data);
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $data = [
            'message' => 'Usuário ' . $user->name . ' criado com Sucesso',
            'data' => $user
        ];
        $role = \Defender::findRole($request->input('role'));
        $user->attachRole($role);

        return $data;
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $user = User::query()->findOrFail($id);
        return view('usuario.editar',compact('user'));

    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        return $data;
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
