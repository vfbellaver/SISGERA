<?php

namespace Sisgera\Http\Controllers\Web;

use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;

class RequerimentoController extends Controller
{
    public function index(){
        // RETORNA OS REQUERIMENTOS DO USUARIO
    }

    public function create(){
        return view('requerimento.create');
    }
}
