<?php

namespace Sisgera\Http\Controllers;

use Illuminate\Http\Request;
use Sisgera\Models\TipoRequerimento;

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
        return view('requerimento.create');
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
