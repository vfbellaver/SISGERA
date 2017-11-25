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
<div id="app">
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h2 class="text-center"><i class="fa fa-graduation-cap"></i></h2>
            <h1 class="text-center">{{ config('app.name', env('APP_NAME')) }}</h1>
        </div>
        <div class="card" style="width: 50%">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bs-component">
                        <form class="m-t" role="form" method="POST" action="{{ route('registro-cadastro') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="cadastro_token" value="{{ $token }}"/>
                            <fieldset class="col-md-12">
                                <legend class="row"><i class="fa fa-lock"></i>&nbsp; Cadastre sua senha
                                </legend>
                            </fieldset>
                            <row>
                                <column size="12">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="control-label" for="password"><h4>
                                                <strong>Senha:</strong></h4></label>
                                        <input class="form-control"
                                               id="password" type="password"
                                               name="password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                     <strong>{{ $errors->first('password') }}</strong>
                                                 </span>
                                        @endif
                                    </div>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                        <label class="control-label" for="confirm_password"><h4>
                                                <strong>Confirmação de senha:</strong></h4></label>
                                        <input class="form-control"
                                               id="confirm_password" type="password"
                                               name="confirm_password">
                                        @if ($errors->has('confirm_password'))
                                            <span class="help-block">
                                                     <strong>{{ $errors->first('confirm_password') }}</strong>
                                                 </span>
                                        @endif
                                    </div>
                                </column>
                            </row>
                            <row>
                                <column size="12">
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <button class="btn btn-primary icon-btn" type="submit"><i
                                                        class="fa fa-fw fa-lg fa-check-circle"></i>Cadastrar senha
                                            </button>
                                        </div>
                                    </div>
                                </column>
                            </row>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>