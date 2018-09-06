@extends('adminlte::page')

@section('title', 'Jogos Servidores IFPE')

@section('content_header')
    <h1>Jogos dos Servidores IFPE 2018</h1>
    <h4>Painel de relatórios</h4>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{route('relatorios.campus')}}" target="_blank" class="btn btn-primary btn-lg col-md-2">Por Campus</a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg col-md-2">Por Idade</a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg col-md-2">Por Sexo</a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg col-md-2">Por Dia</a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg col-md-2">Hospedagempor Dia</a>
            <a href="#" target="_blank" class="btn btn-primary btn-lg col-md-2">Por Modalidade</a>
        </div>
    </div>
@stop
@section('js')
    <script>
        
    </script>
@stop