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
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h2 class="text-center"><i class="fa fa-graduation-cap"></i></h2>
        <h1>{{ config('app.name', env('APP_NAME')) }}</h1>
    </div>
    <div class="login-box">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label for="email" class="control-label">EMAIL</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                       autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password" class="control-label">SENHA</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'    ))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label class="semibold-text">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span
                                    class="label-text">Lembrar senha</span>
                        </label>
                    </div>
                    <p class="semibold-text mb-0"><a data-toggle="flip">Forgot Password ?</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
        </form>
        <div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="forget-form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Esqueci minha senha ?</h3>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">EMAIL</label>
                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                </div>
                <div class="form-group mt-20">
                    <p class="semibold-text mb-0">
                        <a data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i>
                            Back to Login
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>

<!-- SCRIPT QUE MOSTRA RESET DE SENHA-->
<script type="text/javascript">
    $('.login-content [data-toggle="flip"]').click(function () {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>