<html>
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/pdf.css')}}" type="text/css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 cabecalho">
            <img width="100%" src="{{asset('cabecalho/cabecalho_impressao1.png')}}"/>
        </div>
        <table width="100%">
            <tr>
                <td style="font-size: 15pt">REQUERIMENTO</td>
                <td style="text-align: right">
                    <strong style="padding-right: 42px">Protocolo:</strong> {{$requerimento['protocolo']}}<br>
                    <strong>Data:</strong> &nbsp; {{date_format(date_create($requerimento['data_criacao']),'d/m/Y')}}
                    &nbsp;
                    <strong>Hora:</strong> &nbsp; {{date_format(date_create($requerimento['data_criacao']),'H:m')}}
                </td>
            </tr>
        </table>
        <div class="secao">1) Dados Requerente:</div>
        <div class="divider"></div>
        <table style="width: 100%;padding: 10px">
            <tr>
                <td><strong>Nome do Requerente:</strong> &nbsp; {{$requerente['name']}}</td>
            </tr>
            <tr>
                <td width="300px"><strong>Rg:</strong> &nbsp; {{$requerente['rg']}}
                    &nbsp; {{$requerente['org_emissor']}}</td>
                <td><strong>Cpf:</strong> &nbsp; {{$requerente['cpf']}}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong> {{$requerente['email']}}</td>
                <td><strong>Tel Fixo:</strong>&nbsp; {{$requerente['telefone']}}</td>
                <td><strong>Celular:</strong>&nbsp; {{$requerente['celular']}}</td>
            </tr>
            <tr>
                <td><strong>Nome do Estudante:</strong> &nbsp; {{$requerimento['nome_estudante']}}</td>
                <td><strong>Curso:</strong> &nbsp; {{$requerimento['curso']}}</td>
            </tr>
            <tr>
                <td><strong>Periodo:</strong> &nbsp; {{$requerimento['periodo']}}</td>
                <td><strong>Turno:</strong>&nbsp; {{$requerimento['turno']}}</td>
                <td><strong>Turma:</strong>&nbsp; {{$requerimento['turma']}}</td>
            </tr>
        </table>
        <div class="secao">2) Requerimento:</div>
        <div class="divider"></div>
        <div class="solicitacoes">
            @foreach($requerimento['solicitacoes'] as $index => $solicitacao)
                <span class="col-xs-3">{{$solicitacao['name']}}</span>
            @endforeach
        </div>
        <div class="detalhamento">Detalhamento pedido:</div>
        <div class="justificativa">{!!$requerimento['justificativa']!!}</div>
        <div class="secao">3) Parecer:</div>
        <div class="divider"></div>
        <div class="situacao">Requerimento {{$requerimento['situacao']}}</div>
        <div class="detalhamento">Justificativa ou observacões:</div>
        <div class="justificativa">{!!$requerimento['resposta']!!}</div>

        <footer class="footer">
            <div class="localdata"><strong>Local e Data:</strong> Coxim - Mato Grosso do Sul,
                {{date_format(date_create($requerimento['data_fechamento']),'d/m/Y')}}</div>
            <div class="localdata">{{$parecer->name}} - {{$parecer->conta->funcao}}</div>
            <div class="divider"></div>
            <div>
                <img class="footer-image" src="{{asset('cabecalho/ifms_footer.png')}}"/>
            </div>
        </footer>
    </div>
</div>
</body>

</html>