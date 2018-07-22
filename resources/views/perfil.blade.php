@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('title', 'Jogos Servidores IFPE - Endereço')

@section('content_header')
    <h1>Dados do servidor</h1>
    <h4>Favor confirmar se os dados abaixo estão corretos</h4>
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
        <form action="{{ route('perfil') }}" method="post" class="form">
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            <fieldset disabled="disabled" class="hidden-xs hidden-sm">
                <legend>Dados Pessoais</legend>
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Nome:</label>        
                        <input type="text" class="form-control"  name="name" id="name" value="{{ \Auth::user()->name }}">
                    </div>
                    <div class="col-md-6">
                        <label for="campus_nome">Campus:</label>        
                        <input type="text" class="form-control"  name="campus_nome" id="campus_nome" value="{{ \Auth::user()->campus->campus }}">
                    </div>
                    <div class="col-md-3">
                        <label for="siape">SIAPE:</label>        
                        <input type="text" class="form-control"  name="siape" id="siape" value="{{ \Auth::user()->siape }}">
                    </div>
                    <div class="col-md-3">
                        <label for="cpf">CPF:</label>        
                        <input type="text" class="form-control"  name="cpf" id="cpf" value="{{ \Auth::user()->cpf }}">
                    </div>
                    <div class="col-md-3">
                        <label for="nascimento">Data de Nascimento:</label>        
                        <input type="date" class="form-control"  name="nascimento" id="nascimento" value="{{ \Auth::user()->nascimento }}">
                    </div>
                    <div class="col-md-3">
                        <label for="situacao_vinculo">Situação do vinculo:</label>        
                        <input type="text" class="form-control"  name="situacao_vinculo" id="situacao_vinculo" value="{{ \Auth::user()->situacao_vinculo }}">
                    </div>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <legend>Contato</legend>
                <div class="row">
                    <div class="col-md-6">
                        <label for="email">Email institucional:</label>        
                        <input type="email" class="form-control"  name="email" id="email" value="{{ \Auth::user()->email }}">
                    </div>
            </div>
            </fieldset>
            <br>
            <fieldset>
                <legend>Endereço</legend>
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
                            <input type="text" class="form-control"  name="endereco_municipio" id="endereco_municipio" list="cidades_rmr" value="{{ \Auth::user()->endereco_municipio }}">
                            <datalist id="cidades_rmr">
                                <option value='RECIFE'>
                                <option value='JABOATÃO DOS GUARARAPES'>
                                <option value='OLINDA'>
                                <option value='PAULISTA'>
                                <option value='CABO DE SANTO AGOSTINHO'>
                                <option value='CAMARAGIBE'>
                                <option value='SÃO LOURENÇO DA MATA'>
                                <option value='IGARASSU'>
                                <option value='ABREU E LIMA'>
                                <option value='IPOJUCA'>
                                <option value='GOIANA'>
                                <option value='ESCADA'>
                                <option value='MORENO'>
                                <option value='SIRINHAÉM'>
                                <option value='ITAPISSUMA'>
                                <option value='ILHA DE ITAMARACÁ'>
                                <option value='ARAÇOIABA'>                           
                            </datalist>
                        </div>
                    </div>
            </fieldset>
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
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        @if (session('sucesso'))
            $('#alerta_sucesso').delay(3000).slideUp(500);
        @endif
    </script>
@stop