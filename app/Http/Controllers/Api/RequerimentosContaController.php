<?php

namespace Sisgera\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Models\Conta;
use Sisgera\Models\HistoricoRequerimento;
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

    public function despacharRequerimento(Request $request,$id)
    {
        $data = $request->all();
        $requerimento = Requerimento::query()->findOrFail($id);
        $requerimento->visualizado = false;
        $requerimento->conta()->dissociate();
        $cc = $data['conta'];
        $conta = Conta::query()->findOrFail($cc['id']);
        $requerimento->conta()->associate($conta);
        $requerimento->save();

        //SALVANDO HISTORICO NA TABELA DE HISTORICO
        $data = [
            'data_movimentacao' => Carbon::now(),
            'movimentacao'=> 'Encaminhado para '.$conta->funcao,
            'requerimento_id' => $requerimento->id,
            'user_id' => auth()->user()->id,
        ];

        $historico = HistoricoRequerimento::query()->create($data);

        $response = [
            'message' => 'Requerimento Despachado',
            'data' => $requerimento,
        ];
        return $response;
    }

    public function getNoticacoes(){

        if(auth()->user()->conta->name == 'Cerel'){
            return Requerimento::query()
                ->where('conta_id',auth()->user()->conta->id)
                ->where('situacao','=',Requerimento::ENVIADO)
                ->where('visualizado','=',false)
                ->get();
        }
        return Requerimento::query()
                ->where('conta_id',auth()->user()->conta->id)
                ->where('situacao','=',Requerimento::ANDAMENTO)
                ->where('visualizado','=',false)
                ->get();
    }

    public function requerimentoRecebido($id)
    {
        $requerimento = Requerimento::query()->findOrFail($id);
        $requerimento->visualizado = true;
        $requerimento->situacao = Requerimento::ANDAMENTO;
        $requerimento->save();

        $data = [
            'data_movimentacao' => Carbon::now(),
            'movimentacao'=> 'Recebido '.auth()->user()->conta->name,
            'requerimento_id' => $requerimento->id,
            'user_id' => auth()->user()->id,
        ];

        $historico = HistoricoRequerimento::query()->create($data);

        $response = [
            'message' => 'Requerimento Recebido',
            'data' => $requerimento,
        ];

        return $response;
    }

}
