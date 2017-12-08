<?php

namespace Sisgera\Http\Controllers\Api;

use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;

class RequerimentosContaController extends Controller
{
    public function getEntrada()
    {
        return view('conta.requerimentos.entrada');
    }
}
