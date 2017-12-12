<style>
    .cabecalho {
        width: 100%;
    }

    .divider {
        padding-right: 10px;
        padding-left: 10px;
        border-bottom: 1px solid #b6b6b6;
    }

    .secao {
        font-size: 12pt;
        margin-top: 5px;
        background-color: #e6e6e6;
    }

    .justificativa {
        font-size: 12pt;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: justify;
    }

    .solicitacoes {
        font-size: 12pt !important;
        text-align: justify;
        margin-top: 5px;
        padding-left: 20px;
        padding-right: 10px;
    }

    .detalhamento {
        margin-top: 10px;
    }

    .situacao {
        padding-left: 20px;
        padding-top: 10px;
        font-size: 12pt;
    }

    .footer {
        padding: 10px;
        border-top: 1px solid darkgray;
    }

</style>
<body>

<page class="cover-page">
    <div class="cabecalho">
        <img src="{{asset('cabecalho/cabecalho_impressao.png')}}"/>
    </div>
    <table>
        <tr>
            <td style="width: 500px;font-size: 15pt">REQUERIMENTO</td>
            <td>
                <strong>Protocolo:</strong> &nbsp; {{$requerimento['protocolo']}}<br>
                <strong>Data:</strong> &nbsp; {{date_format(date_create($requerimento['data_criacao']),'d/m/Y')}} &nbsp;
                <strong>Hora:</strong> &nbsp; {{date_format(date_create($requerimento['data_criacao']),'H:m')}}
            </td>
        </tr>
    </table>
    <div class="secao">1) Dados Requerente:</div>
    <div class="divider"></div>
    <table style="width: 100%;padding: 15px">
        <tr>
            <td><strong>Nome do Requerente:</strong> &nbsp; {{$usuario['name']}}</td>
        </tr>
        <tr>
            <td width="300px"><strong>Rg:</strong> &nbsp; {{$usuario['rg']}} &nbsp; {{$usuario['org_emissor']}}</td>
            <td><strong>Cpf:</strong> &nbsp; {{$usuario['cpf']}}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong> {{$usuario['email']}}</td>
            <td><strong>Tel Fixo:</strong>&nbsp; {{$usuario['telefone']}}</td>
            <td><strong>Celular:</strong>&nbsp; {{$usuario['celular']}}</td>
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
            <u>{{$solicitacao['name']}}</u>&nbsp;&nbsp;&nbsp;
        @endforeach
    </div>
    <div class="detalhamento">Detalhamento pedido:</div>
    <div class="justificativa">{{$requerimento['justificativa']}}</div>
    <div class="secao">3) Parecer:</div>
    <div class="divider"></div>
    <div class="situacao">Requerimento {{$requerimento['situacao']}}</div>
    <div class="detalhamento">Justificativa ou observacões:</div>
    <div class="justificativa">{{$requerimento['resposta']}}</div>
</page>

<htmlpagefooter name="pageFooter">
   <div class="footer">

   </div>
</htmlpagefooter>
<setpagefooter name="pageFooter" value="on" page="ODD" show-this-page="0"></setpagefooter>
</body>
