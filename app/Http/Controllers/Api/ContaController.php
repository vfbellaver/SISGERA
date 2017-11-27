<?php

namespace Sisgera\Http\Controllers\Api;

use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Http\Requests\CreateContaRequest;
use Sisgera\Http\Requests\UpdateContaRequest;
use Sisgera\Models\Conta;

class ContaController extends Controller
{

    public function index()
    {
        return Conta::query()->paginate(10);
    }


    public function create()
    {
        return view('conta.criar');
    }


    public function store(CreateContaRequest $request)
    {
       $data = $request->all();
       $conta =  new Conta($data);
       $conta->save();

       $response = [
         'message' => 'Conta '.$conta->name.' criada com sucesso!',
         'data' => $conta,
       ];

       return $response;
    }



    public function edit($id)
    {
        $conta = Conta::query()->findOrFail($id);
        return view('conta.editar',compact('conta'));
    }


    public function update(UpdateContaRequest $request, $id)
    {
        $data = $request->all();
        $conta = Conta::query()->findOrFail($id);
        $conta->update($data);

        $response = [
            'message' => 'Conta atualizada com sucesso!',
            'data' => $conta,
        ];

        return $response;
    }


    public function destroy($id)
    {
        $conta = Conta::query()->findOrFail($id);
        $conta->delete();

        $response = [
          'message' => 'Conta apagada!'
        ];

        return $response;
    }
    public function listaContas()
    {
        return view('conta.lista.lista');
    }
}
