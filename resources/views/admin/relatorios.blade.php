@extends('adminlte::page')

@section('title', 'Jogos dos Servidores IFPE')

@section('content_header')
    <h1>{{ env('APP_NAME') }}</h1>
    <h4>Painel de relatórios</h4>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    {{-- <h3 class="box-title"></h3> --}}
                </div>
                    <div class="box-body" >
                    <ul class="nav nav-tabs nav-justified hidden-xs hidden-sm">
                        <li><a data-toggle="tab" href="#campus">Por Campus</a></li>
                        <li><a data-toggle="tab" href="#hospedagem">Hospedagem</a></li>
                        <li><a data-toggle="tab" href="#alimentacao">Alimentação</a></li>
                        <li><a data-toggle="tab" href="#logistica">Logística</a></li>
                    </ul>
                    <ul class="nav nav-tabs  hidden-md hidden-lg">
                        <li><a data-toggle="tab" href="#campus">Campus</a></li>
                        <li><a data-toggle="tab" href="#hospedagem">Hospedagem</a></li>
                        <li><a data-toggle="tab" href="#alimentacao">Alimentação</a></li>
                        <li><a data-toggle="tab" href="#logistica">Logística</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="campus" class="tab-pane fade in active">
                            <h3>Relação por Campus</h3>
                            <p>Relação de servidores inscritos por Campus.</p>
                            <a href="{{route('relatorios.campus')}}" target="_blank" class="btn btn-primary"><i class="fa fa-fw fa-file-pdf-o"></i> Gerar</a>
                        </div>
                        <div id="hospedagem" class="tab-pane fade">
                            <h3>Hospedagem</h3>
                            <p>Relação de servidores inscritos por data, que solicitaram hospedagem para a participação no evento, dividido por sexo.</p>
                            <a href="{{route('relatorios.hospedagem')}}" target="_blank" class="btn btn-primary"><i class="fa fa-fw fa-file-pdf-o"></i> Gerar</a>
                        </div>
                        <div id="alimentacao" class="tab-pane fade">
                            <h3>Alimentação</h3>
                            <p>Relação de servidores inscritos por data.</p>
                            <a href="{{route('relatorios.alimentacao')}}" target="_blank" class="btn btn-primary"><i class="fa fa-fw fa-file-pdf-o"></i> Gerar</a>
                        </div>
                        <div id="logistica" class="tab-pane fade">
                            <h3>Logística</h3>
                            <p>Relação de servidores inscritos, com idade, sexo e as modalidades cadastradas.</p>
                            <a href="{{route('relatorios.logistica')}}" target="_blank" class="btn btn-primary"><i class="fa fa-fw fa-file-pdf-o"></i> Gerar</a>
                        </div>
                    </div>
                </div>
            </div>
            
            {{--  <a href="#" target="_blank" class="btn btn-primary btn-lg btn-block">Por Idade</a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg btn-block">Por Sexo</a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg btn-block">Por Dia</a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg btn-block">Hospedagempor Dia</a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg btn-block">Por Modalidade</a>  --}}
        </div>
    </div>
@stop
@section('js')
    <script>
        
    </script>
@stop