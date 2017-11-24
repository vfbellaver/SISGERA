<?php

namespace Sisgera\Http\Controllers;

use Illuminate\Http\Request;
use Sisgera\Models\Requerimento;
use Sisgera\Models\TiposSolicitacao;

class RequerimentoController extends Controller
{
    public function getTiposRequerimento(){
        return TiposSolicitacao::all();
    }


    public function requerimentosEnviados()
    {
        $user = auth()->user();
        return view('requerimento.enviados',compact('user'));
    }

    public function requerimentosRecebidos()
    {
        $user = auth()->user();
        return view('requerimento.recebidos',compact('user'));
    }
    public function requerimentosDeferidos()
    {
        $user = auth()->user();
        return view('requerimento.deferidos',compact('user'));
    }
    public function requerimentosIndeferidos()
    {
        $user = auth()->user();
        return view('requerimento.indeferidos',compact('user'));
    }
}
