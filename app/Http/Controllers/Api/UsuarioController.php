<?php

namespace Sisgera\Http\Controllers\Api;

use Illuminate\Http\Request;
use Sisgera\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('needsRole:admin');
    }

    public function index()
    {
        //
    }


    public function create()
    {
        return view('usuario.create');
    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

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
