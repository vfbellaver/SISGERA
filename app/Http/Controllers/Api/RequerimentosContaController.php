<?php

namespace Sisgera\Http\Controllers\Api;

use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Models\Requerimento;

class RequerimentosContaController extends Controller
{
    public function entrada()
    {
        return view('conta.requerimentos.entrada');
    }

    public function deferidos()
    {
        return view('conta.requerimentos.deferidos');
    }

    public function indeferidos()
    {
        return view('conta.requerimentos.indeferidos');
    }

    public function parcialmente()
    {
        return view('conta.requerimentos.parcialmente');
    }

    public function getEntrada()
    {
        return Requerimento::query()
            ->where('situacao','=',Requerimento::ANDAMENTO)
            ->where('conta_id','=',auth()->user()->conta->id)->paginate(10);
    }

    public function getDeferidos()
    {
        return Requerimento::query()
            ->where('situacao','=',Requerimento::DEFERIDO)
            ->where('conta_id','=',auth()->user()->conta->id)->paginate(10);
    }

    public function getIndeferidos()
    {
        return Requerimento::query()
            ->where('situacao','=',Requerimento::INDEFERIDO)
            ->where('conta_id','=',auth()->user()->conta->id)->paginate(10);
    }

    public function getParcialmente()
    {
        return Requerimento::query()
            ->where('situacao','=',Requerimento::PARCIALMENTE)
            ->where('conta_id','=',auth()->user()->conta->id)->paginate(10);
    }


}
