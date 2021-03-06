<?php

namespace Sisgera\Http\Controllers;

use Illuminate\Http\Request;
use Sisgera\Models\Requerimento;
use Sisgera\Models\TiposSolicitacao;
use Sisgera\Models\User;

class MeusRequerimentosController extends Controller
{
    // RETORNA TIPOS DE SOLICITACAO DO REQUERIMENTO
    public function TiposdeSolicitacao(){
        return TiposSolicitacao::all();
    }

//---------------------------------------------------------------------------------------------
    // RETORNAM REQUERIMENTOS REGISTRADOS
    public function getEnviados()
    {
        return Requerimento::query()->where('user_id',auth()->user()->id)
            ->where('situacao','=',Requerimento::ENVIADO)->paginate(10);
    }

    public function getRecebidos()
    {
        return Requerimento::query()->where('user_id',auth()->user()->id)
            ->where('situacao','=',Requerimento::ANDAMENTO)->paginate(10);
    }

    public function getDeferidos()
    {
        return Requerimento::query()->where('user_id',auth()->user()->id)
            ->where('situacao','=',Requerimento::DEFERIDO)->paginate(10);
    }

    public function getIndeferidos()
    {
        return Requerimento::query()->where('user_id',auth()->user()->id)
            ->where('situacao','=',Requerimento::INDEFERIDO)->paginate(10);
    }
//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
    // FUNCOES ABAIXO RETORNAM VIEWS
    public function requerimentosEnviados()
    {
        $user = auth()->user();
        return view('requerimento.usuario.enviados',compact('user'));
    }

    public function requerimentosRecebidos()
    {
        $user = auth()->user();
        return view('requerimento.usuario.recebidos',compact('user'));
    }
    public function requerimentosDeferidos()
    {
        $user = auth()->user();
        return view('requerimento.usuario.deferidos',compact('user'));
    }
    public function requerimentosIndeferidos()
    {
        $user = auth()->user();
        return view('requerimento.usuario.indeferidos',compact('user'));
    }
//---------------------------------------------------------------------------------------------
}
