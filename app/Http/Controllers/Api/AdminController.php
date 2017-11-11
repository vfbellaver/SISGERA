<?php

namespace Sisgera\Http\Controllers\Api;


use Artesaos\Defender\Facades\Defender;
use Artesaos\Defender\Role;
use Artesaos\Defender\Traits\Users\HasRoles;
use Sisgera\Http\Controllers\Controller;
use Sisgera\User;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('needsRole:admin');
    }

    public function getCoordenadores(){


        return User::whereHas('roles',
            function($query){ $query->where('name', '=', 'coordernador'); })
            ->paginate(5);

    }

    public function getAlunos(){
        return User::whereHas('roles',
            function($query){ $query->where('name', '=', 'aluno'); })
            ->paginate(10);
    }

    public function editCoordenador(){

    }

    public function editAlunos(){

    }
}
