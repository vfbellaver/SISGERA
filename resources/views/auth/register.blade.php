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
        <div class="logo" style="">
            <h1 class="text-center">Bem vindo ao {{ config('app.name', env('APP_NAME')) }} <i class="fa fa-graduation-cap"></i></h1>
        </div>
        <div class="card" style="width: 90%">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bs-component">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <fieldset class="col-md-12">
                                <legend class="row"><i class="fa fa-user-plus"></i>&nbsp; Cadastro de usuario
                                    <a href="{{ route('login') }}"><small class="pull-right">Voltar pra tela de Login <i class="fa fa-sign-in"></i></small></a>
                                </legend>
                            </fieldset>
                            <row>
                                <column size="6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="control-label" for="name"><h4>
                                                <strong>Nome:</strong></h4></label>
                                        <input class="form-control"
                                               id="name" type="text"
                                               name="name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                     <strong>{{ $errors->first('name') }}</strong>
                                                 </span>
                                        @endif
                                    </div>
                                </column>
                                <column size="6">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="control-label" for="email"><h4>
                                                <strong>Email:</strong></h4></label>
                                        <input class="form-control"
                                               id="email" type="email"
                                               name="email">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                     <strong>{{ $errors->first('email') }}</strong>
                                                 </span>
                                        @endif
                                    </div>
                                </column>
                            </row>
                            <row>
                                <column size="3">
                                    <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                                        <label class="control-label" for="rg"><h4>
                                                <strong>Registro geral:</strong></h4></label>
                                        <input class="form-control"
                                               id="rg" type="text"
                                               name="name">
                                        @if ($errors->has('rg'))
                                            <span class="help-block">
                                                     <strong>{{ $errors->first('name') }}</strong>
                                                 </span>
                                        @endif
                                    </div>
                                </column>
                                <column size="3">
                                    <div class="form-group{{ $errors->has('org_emissor') ? ' has-error' : '' }}">
                                        <label class="control-label" for="org_emissor"><h4>
                                                <strong>Orgão emissor:</strong></h4></label>
                                        <input class="form-control"
                                               id="org_emissor" type="text"
                                               name="org_emissor">
                                        @if ($errors->has('org_emissor'))
                                            <span class="help-block">
                                                     <strong>{{ $errors->first('org_emissor') }}</strong>
                                                 </span>
                                        @endif
                                    </div>
                                </column>
                                <column size="6">
                                    <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                                        <label class="control-label" for="cpf"><h4>
                                                <strong>Cpf:</strong></h4></label>
                                        <input class="form-control"
                                               id="cpf" type="text"
                                               name="cpf">
                                        @if ($errors->has('cpf'))
                                            <span class="help-block">
                                                     <strong>{{ $errors->first('cpf') }}</strong>
                                                 </span>
                                        @endif
                                    </div>
                                </column>
                            </row>
                            <row>
                                <column size="6">
                                    <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                                        <label class="control-label" for="telefone"><h4>
                                                <strong>Telefone Fixo:</strong></h4></label>
                                        <input class="form-control"
                                               id="telefone" type="text"
                                               name="telefone">
                                        @if ($errors->has('telefone'))
                                            <span class="help-block">
                                                     <strong>{{ $errors->first('telefone') }}</strong>
                                                 </span>
                                        @endif
                                    </div>
                                </column>
                                <column size="6">
                                    <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                                        <label class="control-label" for="celular"><h4>
                                                <strong>Celular:</strong></h4></label>
                                        <input class="form-control"
                                               id="celular" type="text"
                                               name="celular">
                                        @if ($errors->has('celular'))
                                            <span class="help-block">
                                                     <strong>{{ $errors->first('celular') }}</strong>
                                                 </span>
                                        @endif
                                    </div>
                                </column>
                            </row>
                            <row>
                                <column size="6">
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
                                <column size="6">
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
                                                        class="fa fa-fw fa-lg fa-check-circle"></i>Registrar
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