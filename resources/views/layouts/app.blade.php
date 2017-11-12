<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="sidebar-mini fixed">
<div id="app">
    <div class="wrapper">
        <header class="main-header hidden-print">
            <a class="navbar-brand" href="{{route('home')}}">
                {{ config('app.name', env('APP_NAME')) }} <i class="fa fa-graduation-cap"></i>

            </a>
            <nav class="navbar navbar-static-top">
                <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
                <div class="navbar-custom-menu">
                    <ul class="top-nav">
                        <!--Notification Menu-->
                        <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#"
                                                                  data-toggle="dropdown" aria-expanded="false"><i
                                        class="fa fa-bell-o fa-lg"></i></a>
                            <ul class="dropdown-menu">
                                <li class="not-head">You have 4 new notifications.</li>
                                <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span
                                                    class="fa-stack fa-lg"><i
                                                        class="fa fa-circle fa-stack-2x text-primary"></i><i
                                                        class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                        <div class="media-body"><span class="block">Lisa sent you a mail</span><span
                                                    class="text-muted block">2min ago</span></div>
                                    </a></li>
                                <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span
                                                    class="fa-stack fa-lg"><i
                                                        class="fa fa-circle fa-stack-2x text-danger"></i><i
                                                        class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                        <div class="media-body"><span class="block">Server Not Working</span><span
                                                    class="text-muted block">2min ago</span></div>
                                    </a></li>
                                <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span
                                                    class="fa-stack fa-lg"><i
                                                        class="fa fa-circle fa-stack-2x text-success"></i><i
                                                        class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                        <div class="media-body"><span class="block">Transaction xyz complete</span><span
                                                    class="text-muted block">2min ago</span></div>
                                    </a></li>
                                <li class="not-footer"><a href="#">See all notifications.</a></li>
                            </ul>
                        </li>
                        <!-- User Menu-->
                        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                                                aria-haspopup="true" aria-expanded="false"><i
                                        class="fa fa-user fa-lg"></i></a>
                            <ul class="dropdown-menu settings-menu">
                                <li><a href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                                <li><a href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
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

                {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--@guest--}}
                {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                {{--@else--}}
                {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                {{--aria-expanded="false" aria-haspopup="true">--}}
                {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                {{--</a>--}}

                {{--<ul class="dropdown-menu">--}}
                {{--<li>--}}
                {{--<a href="{{ route('logout') }}"--}}
                {{--onclick="event.preventDefault();--}}
                {{--document.getElementById('logout-form').submit();">--}}
                {{--Logout--}}
                {{--</a>--}}

                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
                {{--style="display: none;">--}}
                {{--{{ csrf_field() }}--}}
                {{--</form>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--@endguest--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</nav>--}}
                @guest
                @else
                    <menu-admin></menu-admin>
                    @endguest
            </section>
        </aside>

        <div class="content-wrapper">

            @yield('content')

        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
