<?php

namespace Sisgera\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sisgera\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->getRoleAttribute();

        if ($role->name == User::ADMIN) {
            return redirect()->route('admin.index');
        }


        return view('home');
    }
}
