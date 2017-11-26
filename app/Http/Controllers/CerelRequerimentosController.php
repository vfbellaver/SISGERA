<?php

namespace Sisgera\Http\Controllers;


use Sisgera\Models\Requerimento;
use Sisgera\Models\TiposSolicitacao;

class CerelRequerimentosController extends Controller
{
    public function __construct()
    {
      $this->middleware('needsRole:cerel');
    }

    // RETORNA TIPOS DE SOLICITACAO DO REQUERIMENTO
    public function TiposdeSolicitacao(){
        return TiposSolicitacao::all();
    }

//---------------------------------------------------------------------------------------------
    // RETORNAM REQUERIMENTOS REGISTRADOS

    public function getRecebidos()
    {
        return Requerimento::query()->where('situacao','=',Requerimento::ANDAMENTO)->paginate(10);
    }

    public function getDeferidos()
    {
        return Requerimento::query()->where('usuario_id',auth()->user()->id)
            ->where('situacao','=',Requerimento::DEFERIDO)->paginate(10);
    }

    public function getAll()
    {
        return Requerimento::query()->paginate(10);
    }
//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
    // FUNCOES ABAIXO RETORNAM VIEWS

    public function requerimentosRecebidos()
    {
        return view('requerimento.cerel.recebidos');
    }
    public function requerimentosList()
    {
        return view('requerimento.cerel.list');
    }
    public function requerimentosIndeferidos()
    {
        $user = auth()->user();
        return view('requerimento.indeferidos',compact('user'));
    }
//---------------------------------------------------------------------------------------------
}
