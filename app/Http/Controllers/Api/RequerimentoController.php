<?php

namespace Sisgera\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Http\Requests\CreateRequerimentoRequest;
use Sisgera\Http\Requests\UpdateRequerimentoRequest;
use Sisgera\Models\Conta;
use Sisgera\Models\HistoricoRequerimento;
use Sisgera\Models\Requerimento;
use Sisgera\Models\TiposSolicitacao;
use Sisgera\Models\User;
use Sisgera\Notifications\MovimentoRequerimento;
use Sisgera\Notifications\NovoRequerimento;

class RequerimentoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $user = User::query()->findOrFail(auth()->user()->id);
        return view('requerimento.create',compact('user'));
    }

    public function store(CreateRequerimentoRequest $request)
    {

        $data = $request->all();
        $requerimento = new Requerimento($data);
        $requerimento->data_criacao = Carbon::now();

        $conta = Conta::query()->findOrFail(5);
        $requerimento->protocolo = gerar_protocolo();
        $requerimento->user_id = auth()->user()->id;
        $requerimento->conta()->associate($conta);
        $requerimento->save();



        foreach ($data['tipos_solicitacao'] as $solicitacao )
        {
            $tp = TiposSolicitacao::query()->findOrFail($solicitacao['id']);
            $requerimento->solicitacao()->attach($tp);

        }

        //SALVANDO HISTORICO NA TABELA DE HISTORICO
        $data = [
            'data_movimentacao' => Carbon::now(),
            'movimentacao' => 'Requerimento Enviado',
            'requerimento_id' => $requerimento->id,
            'user_id' => auth()->user()->id,
        ];

        $historico = HistoricoRequerimento::query()->create($data);

        //NOTIFICA O USUARIO SOBRE A CRIACAO VIA EMAIL
        $user = User::query()->findOrFail(auth()->user()->id);
        $user->notify(new NovoRequerimento($user,$requerimento));

        $response = [
            'message' => 'Requerimento enviado com sucesso.',
            'data' => $requerimento,
        ];

        return $response;
    }


    public function show($id)
    {
       return Requerimento::query()->findOrFail($id);
    }


    public function edit($id)
    {
        $requerimento = Requerimento::query()->findOrFail($id);
        return view('requerimento.show.editar', [
            'requerimento' => $requerimento
        ]);
    }


    public function update(UpdateRequerimentoRequest $request, $id)
    {
        $requerimento = Requerimento::query()->findOrFail($id);
        $data = $request->all();

        $requerimento->update($data);

        $movimentacao = [
            'data_movimentacao' => Carbon::now(),
            'movimentacao'=> $requerimento->situacao,
            'requerimento_id' => $requerimento->id,
            'user_id' => auth()->user()->id,
        ];

        $historico = HistoricoRequerimento::query()->create($movimentacao);

        //NOTIFICA O USUARIO SOBRE A CRIACAO VIA EMAIL
        $user = User::query()->findOrFail(auth()->user()->id);
        $user->notify(new MovimentoRequerimento($user,$requerimento,$historico));

        $response = [
            'message' => 'Requerimento '.$requerimento->situacao.'.',
            'data' => $requerimento
        ];

        return $response;
    }

}
