<?php

namespace Sisgera\Http\Controllers\Api;


use Sisgera\Http\Controllers\Controller;
use Sisgera\User;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('needsRole:admin');
    }

    public function getCoordenadores(){

    }

    public function getAlunos(){

    }

    public function editCoordenador(){

    }

    public function editAlunos(){

    }
}
