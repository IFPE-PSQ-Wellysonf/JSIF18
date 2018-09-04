@extends('adminlte::page')

@section('title', 'Jogos Servidores IFPE')

@section('content_header')
    {{-- <h1>Jogos dos Servidores IFPE 2018</h1> --}}
@stop

@section('content')
<div class="row">
    @if (session('sucesso'))
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible" id="alerta_sucesso">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
            <p>{{ session('sucesso') }}</p>
        </div>
    </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-danger"></i> Atenção:</h4>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach 
        </div>
    @endif
</div>
    {{-- <div class="row">
         @if (session('sucesso'))
        <div class="col-md-12 col-xs-12">
            <div class="alert alert-success alert-dismissible" id="alerta_sucesso">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                <p>{{ session('sucesso') }}</p>
            </div>
        </div>
        @endif
        Box de validação do endereço
        <div class="col-md-3">
            @if(\Auth::user()->endereco_confirmado)
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>OK</h3>
            @else
            <div class="small-box bg-red">
                    <div class="inner">
                        <h3>NÃO</h3>
            @endif
                    <p>Confirmou Endereço</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-map"></i>
                </div>
                <a href="{{ route('perfil') }}" class="small-box-footer">Atualize agora <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        Box de validação do email
        <div class="col-md-3">
            @if(!is_null(\Auth::user()->email))
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>OK</h3>
            @else
            <div class="small-box bg-red">
                    <div class="inner">
                        <h3>NÃO</h3>
            @endif
                    <p>Confirmou Email</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-envelope"></i>
                </div>
                <a href="{{ route('perfil') }}" class="small-box-footer">Atualize agora <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        Box da quantidade de modalidades
        <div class="col-md-3">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ count($inscricoes) }}</h3>
                    <p>Modalidade selecionadas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-pencil-square-o"></i>
                </div>
                <a href="{{ route('inscricao1') }}" class="small-box-footer">Atualize agora <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        Solicitação de diárias
        <div class="col-md-3">
        @if(in_array(strtoupper(\Auth::user()->endereco_municipio), $rmr))
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>Reside na</h3>
                    <p>Região Metropolitana do Recife</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-home"></i>
                </div>
                <a href="{{ route('perfil') }}" class="small-box-footer">Atualize agora <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        @else
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>@if(\Auth::user()->solicitou_diarias) Sim  @else Não @endif</h3>
                    <p>Necessito de hospedagem</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-home"></i>
                </div>
                <a href="{{ route('inscricao1') }}" class="small-box-footer">Atualize agora <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        @endif
        </div>
    </div> --}}
    <div class="row">
        {{-- <div class="col-md-2 hidden-xs hidden-sm">
            <img src="{{ asset('img/logo.PNG') }}" style="max-width: 100%;">
        </div> --}}
        <div class="col-md-12 col-sm-12">
            <div class="alert alert-warning" role="alert">Atenção aos informes abaixo!</div>
            <h3>Informes:</h3>
            <ul>
                <li>No(a) caso de não comparecimento do(a) atleta que solicitar hospedagem, o (a) mesmo(a) poderá ter que vir a ressarcir ao erário público através de GRU;</li>
                {{--  <li>Caso o(a) atleta não compareça a(s) modalidade(s) para a(s) qual(is) se inscreveu, poderá ser penalizado com a não participação na próxima edição do evento;</li>  --}}
                <li>Caso o(a) atleta não apresente ao(a) representante do Núcleo de Esporte e Lazer de seu campi os exames médicos com parecer de aptidão para realização de atividade física, deverá assinar o "Termo de Responsabilidade e Compromisso" para poder participar do evento;</li>
                <li>O(a) atleta deve observar o cronograma do evento antes de realizar a inscrição, pois haverá momentos em que modalidades ocorrerão concomitantemente;</li>
                <li>O(a) atleta deve portar durante o evento um documento oficial com foto.</li>
            </ul>
            {{-- <ul>
                <li>Modalidades: o(a) servidor(a) deve selecionar àquela(s) que deseja participar independente de quantidade, esclarecemos que não significa que todas serão ofertadas.</li>
                <li>Os atletas que não são residentes na Região Metropolitana do Recife, deverão informar a necessidade de hospedagem e alimentação, para ajuda no período dos jogos.</li>
                <li>Esclarecemos que o Núcleo de Esporte e Lazer recomenda a realização de exames médicos por parte de todo e qualquer servidor que desejar participar do V Jogos dos Servidores do IFPE, porém os mesmos não serão considerados obrigatórios para participação no evento. (Para aqueles que não realizarem os exames médicos haverá a opção de assinar um termo de responsabilidade).</li>
                <li>O V Jogos dos servidores do IFPE ocorrerão no município de Recife e região metropolitana no período de 03 a 05 de outubro e de 08 a 10 de outubro de 2018.</li>
                <li>Para participação no evento é obrigatória a pré-inscrição no período de 24 de julho a 24 de agosto de 2018. Posteriormente, os servidores receberão um email em seu email institucional (esse dado deverá ser informado obrigatoriamente nesta pré inscrição clicando <a href="{{ route('perfil') }}" target="_self">AQUI</a>) a fim de confirmar a inscrição no evento e nas modalidades previamente selecionadas.</li>
            </ul> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Datas de realização dos jogos por modalidade:</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>03/10</th>
                        <th>04/10</th>
                        <th>05/10</th>
                        <th>08/10</th>
                        <th>09/10</th>
                        <th>10/10</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Atletismo</td>
                        <td>Abertura</td>
                        <td>Natação</td>
                        <td>Volei de praia</td>
                        <td>Futsal (Masc)</td>
                        <td>Futsal (Masc e Fem)</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Futebol</td>
                        <td>Futebol</td>
                        <td>Futebol Society</td>
                        <td>Basquete</td>
                        <td>Xadrez</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Vôlei de quadra</td>
                        <td>Futvôlei</td>
                        <td>Dominó</td>
                        <td>Badminton</td>
                        <td>Jogos Eletrônicos</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Jogos Populares</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <samp>Em caso de dúvidas ou sugestões, favor entrar em contato: <a href="mailto:ddqv@reitoria.ifpe.edu.br">ddqv@reitoria.ifpe.edu.br</a></samp>
        </div>
    </div>
@stop
@section('js')
    <script>
        @if (session('sucesso'))
            $('#alerta_sucesso').delay(3000).slideUp(500);
        @endif
    </script>
@stop