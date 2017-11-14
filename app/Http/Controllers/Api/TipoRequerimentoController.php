<?php

namespace Sisgera\Http\Controllers\Api;

use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Models\TipoRequerimento;

class TipoRequerimentoController extends Controller
{
    public function index(){
        return TipoRequerimento::all();
    }
}
