<?php

namespace Sisgera\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sisgera\Models\User;


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

            return view('dashboard.index');
        }

        if ($role->name == User::COORDENADOR) {

            return view('dashboard.index');
        }

        if ($role->name == User::CEREL) {
            return view('dashboard.index');
        }

        if ($role->name == User::CIVIL) {
            return view('dashboard.index');
        }

        return redirect()->route('login');
    }
}
