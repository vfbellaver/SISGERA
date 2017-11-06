<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    .navbar {
        margin-bottom:0;
    }
</style>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <a class="navbar-brand">
                    {{ config('app.name', env('APP_NAME')) }}  <i class="glyphicon glyphicon-calendar"></i>
                </a>

            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-md-2 row">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                <div class="nav navbar-nav navbar-left">
                    <div class="menu">
                        <li><a href=""> Menu 1</a></li>
                        <li><a href="">Menu 2</a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false" aria-haspopup="true">DropDown</a> <span class="caret"></span>
                            <ul class="dropdown-menu">
                                <li>Dropdown menu 1</li>
                                <li>Dropdown menu 2</li>
                                <li>Dropdown menu 3</li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10">

    @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
