<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{asset('sisgera.png')}}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{route('sisgera.js')}}" type="text/javascript"></script>
</head>

<body class="sidebar-mini fixed">
<div id="app" class="wrapper">
    <header class="main-header hidden-print">
        <a class="logo" href="{{route('home')}}">
            {{ config('app.name', env('APP_NAME')) }} <i class="fa fa-graduation-cap"></i>
        </a>
        <nav class="navbar navbar-static-top">
            <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
            <div class="navbar-custom-menu">
                <ul class="top-nav">
                    <li style="color: white">@{{user.name}}</li>
                    <!--Notificacao Menu-->
                    @if(auth()->user()->conta)
                    <notificacao></notificacao>
                    @endif
                    <!-- User Menu-->
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-user fa-lg"></i></a>
                        <ul class="dropdown-menu settings-menu">
                            <li><a href="{{route('perfil-usuario')}}"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                            <li>
                                <a href="javascript:;"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-lg"></i>
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar hidden-print">
        <section class="sidebar">
            @guest
            @else
                <menu-aside :regra="{{auth()->user()->getRoleAttribute()}}"></menu-aside>
            @endguest
        </section>
    </aside>


    <div class="content-wrapper">

        @yield('content')

    </div>
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
