<?php

namespace Sisgera\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $menu = 'menu-admin';
        return view('admin.index',compact('menu'));
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
        //
    }
}
