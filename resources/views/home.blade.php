@extends('adminlte::page')

@section('title', 'Jogos Servidores IFPE')

@section('content_header')
    <h1>Jogos dos Servidores IFPE 2018</h1>
@stop

@section('content')
    <div class="row">
        {{-- Box de validação do endereço --}}
        <div class="col-md-3">
            @if(\Auth::user()->endereco_confirmado)
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>SIM</h3>
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
        {{-- Box de validação do email --}}
        <div class="col-md-3">
            @if(!is_null(\Auth::user()->email))
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>SIM</h3>
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
        {{-- Box da quantidade de modalidades --}}
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
        {{-- Solicitação de diárias --}}
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
                    <p>Necessito de diárias</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-home"></i>
                </div>
                <a href="{{ route('inscricao1') }}" class="small-box-footer">Atualize agora <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 hidden-xs hidden-sm">
            <img src="{{ asset('img/logo.PNG') }}" style="max-width: 100%;">
        </div>
        <div class="col-md-10 col-sm-12">
            <h3>Informes:</h3>
            <ul>
                <li>Modalidades: o(a) servidor(a) deve selecionar àquela(s) que deseja participar independente de quantidade, esclarecemos que não significa que todas serão ofertadas.</li>
                <li>Os atletas que não são residentes na Região Metropolitana do Recife, deverão informar a necessidade de emissão de diárias, para ajuda na hospedagem e alimentação.</li>
                <li>Esclarecemos que o Núcleo de Esporte e Lazer recomenda a realização de exames médicos por parte de todo e qualquer servidor que desejar participar do V Jogos dos Servidores do IFPE, porém os mesmos não serão considerados obrigatórios para participação no evento. (Para aqueles que não realizarem os exames médicos haverá a opção de assinar um termo de responsabilidade).</li>
                <li>O V Jogos dos servidores do IFPE ocorrerão no município de Recife e região metropolitana no período de 03 a 05 de outubro e de 08 a 10 de outubro de 2018.</li>
                <li>Para participação no evento é obrigatória a pré-inscrição no período de 24 de julho a 24 de agosto de 2018. Posteriormente, os servidores receberão um email em seu email institucional (esse dado deverá ser informado obrigatóriamente nesta pré inscrição clicando <a href="{{ route('perfil') }}" target="_self">AQUI</a>) a fim de confirmar a inscrição no evento e nas modalidades previamente selecionadas.</li>
            </ul>
        </div>
    </div>
@stop
