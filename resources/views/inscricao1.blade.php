@extends('adminlte::page')

@section('title', 'Jogos Servidores IFPE - Endereço')

@section('content_header')
    <h1>Modalidades</h1>
    <h3>Selecione as modalidades que deseja competir</h3>
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
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Atenção:</h4>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach 
        </div>
    @endif
    <div class="col-md-6 col-md-offset-1">
        <form action="{{ route('preinscricao') }}" method="post" class="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group">
                    @foreach($modalidades as $modalidade)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="modalidade[]" value="{{ $modalidade->id }}" @if(count($inscricoes->where('modalidade_id', $modalidade->id))>0) checked @endif>
                            {{ $modalidade->modalidade }}
                            @if(count($inscricoes->where('modalidade_id', $modalidade->id))>0) 
                                <i class="fa fa-fw fa-check"></i>
                            @endif
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            @php
                if(env('FILTRO_DIARIA_RESIDENCIA', false)){
                    $validacao_residencia = !in_array(strtoupper(\Auth::user()->endereco_municipio), $rmr);
                }else {
                    $validacao_residencia = true;
                }
                if(env('FILTRO_DIARIA_LOTACAO', false)){
                    $validacao_campi = !in_array(strtoupper(\Auth::user()->campus_id), $rmr_id);
                }else {
                    $validacao_campi = true;
                }
            @endphp
            {{-- @if(!in_array(strtoupper(\Auth::user()->endereco_municipio), $rmr)) --}}
            @if($validacao_residencia && $validacao_campi)
            <div class="row">
                <h4>Você necessitará de diárias para o período do evento?</h4>
                {{--<p class="help-block">Ressaltamos que haverá um termo de compromisso a fim de garantir o uso do hotel e da alimentação a ser ofertada para o evento</p>--}}
                <div class="radio">
                    <label>
                    <input type="radio" name="diarias" value="sim" @if(\Auth::user()->solicitou_diarias) checked @endif>
                        Sim, necessitarei.
                    </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="diarias" value="nao" @if(!\Auth::user()->solicitou_diarias) checked @endif>
                        Não será necessário.
                    </label>
                </div>
            </div>
            <br>
            @endif
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
        @if ($errors->any())
            $('.alert-dismissible').delay(10000).slideUp(500);
        @endif
    </script>
@stop