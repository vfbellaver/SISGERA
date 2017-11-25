<?php

namespace Sisgera\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Http\Requests\CreateRequerimentoRequest;
use Sisgera\Models\Requerimento;
use Sisgera\Models\TiposSolicitacao;
use Sisgera\Models\User;

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
        $requerimento->protocolo = gerar_protocolo();
        $requerimento->usuario_id = auth()->user()->id;
        $requerimento->save();

        foreach ($data['tipos_solicitacao'] as $solicitacao )
        {
            $tp = TiposSolicitacao::query()->where('id',$solicitacao['id'])->get();
            $requerimento->TipoRequerimento()->attach($tp);
        }

        $response = [
            'message' => 'Requerimento enviado com sucesso.',
            'data' => $requerimento,
        ];

        return $response;
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


}
