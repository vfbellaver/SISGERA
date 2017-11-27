<?php

namespace Sisgera\Http\Controllers\Api;

use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Models\Conta;

class ContaController extends Controller
{

    public function index()
    {
        return Conta::all();
    }


    public function create()
    {
        //
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

    }
}
