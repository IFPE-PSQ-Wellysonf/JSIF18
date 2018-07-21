@extends('adminlte::page')

@section('title', 'Jogos Servidores IFPE - Endereço')

@section('content_header')
    <h1>Endereço</h1>
    <h3>Favor confirmar se os dados abaixo estão corretos</h3>
@stop

@section('content')
<div class="row">
    @if (session('sucesso'))
    <div class="col-md-12 col-xs-12">
        <div class="alert alert-success alert-dismissible" id="alerta_sucesso">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
            <p>{{ session('sucesso') }}</p>
        </div>
    </div>
    @endif
    <div class="col-md-12">
        <form action="{{ route('endereco') }}" method="post" class="form">
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <label for="endereco_logradouro">Logradouro:</label>        
                    <input type="text" class="form-control"  name="endereco_logradouro" id="endereco_logradouro" value="{{ \Auth::user()->endereco_logradouro }}">
                </div>
                <div class="col-md-2">
                    <label for="endereco_numero">Número:</label>        
                    <input type="text" class="form-control"  name="endereco_numero" id="endereco_numero" value="{{ \Auth::user()->endereco_numero }}">
                </div>
                <div class="col-md-4">
                    <label for="endereco_complemento">Complemento:</label>        
                    <input type="text" class="form-control"  name="endereco_complemento" id="endereco_complemento" value="{{ \Auth::user()->endereco_complemento }}">
                </div>
                <div class="col-md-5">
                    <label for="endereco_bairro">Bairro:</label>        
                    <input type="text" class="form-control"  name="endereco_bairro" id="endereco_bairro" value="{{ \Auth::user()->endereco_bairro }}">
                </div>
                <div class="col-md-2">
                    <label for="endereco_cep">CEP:</label>        
                    <input type="text" class="form-control"  name="endereco_cep" id="endereco_cep" value="{{ \Auth::user()->endereco_cep }}">
                </div>
                <div class="col-md-5">
                    <label for="endereco_municipio">Municipio:</label>        
                    <input type="text" class="form-control"  name="endereco_municipio" id="endereco_municipio" value="{{ \Auth::user()->endereco_municipio }}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                </div>
            </div>
        </form>
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