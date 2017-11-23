<?php

namespace Sisgera\Http\Controllers;

use Illuminate\Http\Request;
use Sisgera\Models\TipoRequerimento;
use Sisgera\Models\User;

class RequerimentoController extends Controller
{

    public function index()
    {
        //
    }

    public function getTiposRequerimento(){
        return TipoRequerimento::all();
    }

    public function create()
    {
        $user = User::query()->findOrFail(auth()->user()->id);
        return view('requerimento.create',compact('user'));
    }

    public function store(Request $request)
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
