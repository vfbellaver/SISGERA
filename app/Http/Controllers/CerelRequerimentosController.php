<?php

namespace Sisgera\Http\Controllers;


use Sisgera\Models\Requerimento;
use Sisgera\Models\TiposSolicitacao;

class CerelRequerimentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('needsRole:admin|coordenador|cerel,true');
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
        return Requerimento::query()->where('situacao','=',Requerimento::DEFERIDO)->paginate(10);
    }

    public function getIndeferidos()
    {
        return Requerimento::query()->where('situacao','=',Requerimento::INDEFERIDO)->paginate(10);
    }

    public function getEnviados()
    {
        return Requerimento::query()->where('situacao','=',Requerimento::ENVIADO)->paginate(10);
    }

    public function getAll()
    {
        return Requerimento::query()->paginate(10);
    }
//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
    // FUNCOES ABAIXO RETORNAM VIEWS
    public function requerimentosEnviados()
    {
        return view('requerimento.listas.enviados');
    }

    public function requerimentosRecebidos()
    {
        return view('requerimento.listas.recebidos');
    }

    public function requerimentosList()
    {
        return view('requerimento.listas.todos');
    }

    public function requerimentosDeferidos()
    {
        return view('requerimento.listas.deferidos');
    }

    public function requerimentosIndeferidos()
    {
        return view('requerimento.listas.indeferidos');
    }

//---------------------------------------------------------------------------------------------
}
