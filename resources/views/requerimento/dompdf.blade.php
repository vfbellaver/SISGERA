<?php
set_time_limit(120);
?>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

<div class="col-xs-12 text-center">
    <img src="{{asset('cabecalho/cabecalho_impressao.png')}}"/>
</div>
<div class="col-xs-12">
    <div class="col-xs-8 bg-info">
        <h2>Requerimento</h2>
    </div>

    <div class="col-xs-4 bg-primary">
        <h5>Protocolo: &nbsp; {{$requerimento['protocolo']}}</h5>
        <h5>Data: &nbsp; {{$requerimento['data_criacao']}} &nbsp; Hora: {{$requerimento['data_criacao']}} </h5>
    </div>
</div>
<div class="col-xs-12 secao">
    <h3>1) DADOS DO REQUERENTE</h3>
    <div class="col-xs-12 dadossecao">
            <h4><strong>Nome do Estudante:</strong>&nbsp; {{$usuario['name']}}</h4>
    </div>
    <div class="col-xs-12 dadossecao">
        <h4>
            <strong>RG:</strong>&nbsp; {{$usuario['rg']}} - {{$usuario['org_emissor']}} &nbsp;&nbsp;
            <strong>CPF:</strong>&nbsp; {{$usuario['cpf']}}
        </h4>

    </div>
</div>
</body>
</html>