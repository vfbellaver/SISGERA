<?php

namespace Sisgera\Http\Controllers\Api;

use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Http\Requests\CreateRequerimentoRequest;
use Sisgera\Models\TiposSolicitacao;
use Sisgera\Models\User;

class RequerimentoController extends Controller
{
    public function index()
    {
        //
    }

    public function getTiposRequerimento(){
        return TiposSolicitacao::all();
    }

    public function create()
    {
        $user = User::query()->findOrFail(auth()->user()->id);
        return view('requerimento.create',compact('user'));
    }

    public function store(CreateRequerimentoRequest $request)
    {
        //
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
