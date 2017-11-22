<?php

namespace Sisgera\Http\Controllers;


use Sisgera\Models\User;

class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('needsRole:admin');
    }


    public function getCurrentUser(){
        return User::where('id',auth()->user()->id);
    }

    public function getCoordenadores()
    {

        $data = User::whereHas('roles',
            function ($query) {
                $query->where('name', '=', 'coordenador');
            })
            ->paginate(10);

        return $data;

    }

    public function getAlunos()
    {
        return User::whereHas('roles',
            function ($query) {
                $query->where('name', '=', 'aluno');
            })
            ->paginate(10);
    }

    public function getCerel()
    {
        return User::whereHas('roles',
            function ($query) {
                $query->where('name', '=', 'cerel');
            })
            ->paginate(10);
    }

    public function getCivis()
    {
        return User::whereHas('roles',
            function ($query) {
                $query->where('name', '=', 'civil');
            })
            ->paginate(10);
    }

    public function listaCoordenadores()
    {
        return view('users.lista-coordenadores');
    }

    public function listaAlunos()
    {
        return view('users.lista-alunos');
    }

    public function listaCerel()
    {
        return view('users.lista-cerel');
    }

    public function listaCivis()
    {
        return view('users.lista-civis');
    }
}