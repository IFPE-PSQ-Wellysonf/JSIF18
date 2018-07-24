@extends('adminlte::page')

@section('title', 'Jogos Servidores IFPE')

@section('content_header')
    <h1>Jogos dos Servidores IFPE 2018</h1>
    <h4>Painel de acompanhamento</h4>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Modalidade</th>
                        <th>Qtd Inscritos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inscricoes as $inscricao)
                    <tr>
                        <td>{{$modalidades->where('id',$inscricao->modalidade_id)->first()->modalidade}}</td>
                        <td>{{$inscricao->qtd}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- <div class="row">
        <div class="col-md-2 hidden-xs hidden-sm">
            <img src="{{ asset('img/logo.PNG') }}" style="max-width: 100%;">
        </div>
        <div class="col-md-10 col-sm-12">
            <h3>Informes:</h3>
            <ul>
                <li>Modalidades: o(a) servidor(a) deve selecionar àquela(s) que deseja participar independente de quantidade, esclarecemos que não significa que todas serão ofertadas.</li>
                <li>Os atletas que não são residentes na Região Metropolitana do Recife, deverão informar a necessidade de hospedagem e alimentação, para ajuda no período dos jogos.</li>
                <li>Esclarecemos que o Núcleo de Esporte e Lazer recomenda a realização de exames médicos por parte de todo e qualquer servidor que desejar participar do V Jogos dos Servidores do IFPE, porém os mesmos não serão considerados obrigatórios para participação no evento. (Para aqueles que não realizarem os exames médicos haverá a opção de assinar um termo de responsabilidade).</li>
                <li>O V Jogos dos servidores do IFPE ocorrerão no município de Recife e região metropolitana no período de 03 a 05 de outubro e de 08 a 10 de outubro de 2018.</li>
                <li>Para participação no evento é obrigatória a pré-inscrição no período de 24 de julho a 24 de agosto de 2018. Posteriormente, os servidores receberão um email em seu email institucional (esse dado deverá ser informado obrigatoriamente nesta pré inscrição clicando <a href="{{ route('perfil') }}" target="_self">AQUI</a>) a fim de confirmar a inscrição no evento e nas modalidades previamente selecionadas.</li>
            </ul>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <samp>Em caso de dúvidas ou sugestões, favor entrar em contato: <a href="mailto:ddqv@reitoria.ifpe.edu.br">ddqv@reitoria.ifpe.edu.br</a></samp>
        </div>
    </div> --}}
@stop
@section('js')
    <script>
        @if (session('sucesso'))
            $('#alerta_sucesso').delay(3000).slideUp(500);
        @endif
    </script>
@stop