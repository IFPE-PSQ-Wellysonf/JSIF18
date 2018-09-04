@extends('adminlte::page')

@section('title', 'Jogos Servidores IFPE - Endereço')

@section('content_header')
    <h1>Modalidades</h1>
    <h3>Selecione as modalidades que deseja competir</h3>
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
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Atenção:</h4>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach 
        </div>
    @endif
    <div class="col-md-6 col-xs-12">
        <form action="{{ route('inscricao1') }}" method="post" class="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group">
                    @foreach($modalidades as $modalidade)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="modalidade[]" value="{{ $modalidade->id }}" @if(count($inscricoesfinais->where('modalidade_id', $modalidade->id))>0) checked @endif>
                            {{ $modalidade->modalidade }}
                            @if(count($inscricoes->where('modalidade_id', $modalidade->id))>0) 
                                <i class="fa fa-fw fa-check-square"></i>
                            @endif
                            @if(count($inscricoesfinais->where('modalidade_id', $modalidade->id))>0) 
                                <i class="fa fa-fw fa-check-square-o"></i>
                            @endif
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            {{-- @if(!in_array(strtoupper(\Auth::user()->endereco_municipio), $rmr))
            <div class="row">
                <h4>Você necessitará de hospedagem e alimentação para o período do evento?</h4>
                <p class="help-block">Ressaltamos que haverá um termo de compromisso a fim de garantir o uso do hotel e da alimentação a ser ofertada para o evento</p>
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
            @endif --}}
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                </div>
            </div>
        </form>
        <p>*Legenda:</p>
        <p><i class="fa fa-fw fa-check-square"></i> Solicitado na pré-inscrição</p>
        <p><i class="fa fa-fw fa-check-square-o"></i> Confirmado na inscrição</p>

    </div>
    <div class="col-md-6 col-xs-12">
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
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="2" style="text-align: center">ATLETISMO - MASCULINO E FEMININO</th>
                        </tr>
                        <tr>
                            <th style="text-align: center">PROVAS</th>
                            <th style="text-align: center">DATA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>100 m</td>
                            <td rowspan="12" style="vertical-align: middle; text-align: center">03/10</td>
                        </tr>
                        <tr><td>200 m</td></tr>
                        <tr><td>400 m</td></tr>
                        <tr><td>800 m</td></tr>
                        <tr><td>1500 m</td></tr>
                        <tr><td>3000 m</td></tr>
                        <tr><td>4 x 100 m</td></tr>
                        <tr><td>4 x 400 m</td></tr>
                        <tr><td>Salto em altura</td></tr>
                        <tr><td>Salto em distância</td></tr>
                        <tr><td>Arremesso de Peso</td></tr>
                        <tr><td>Lançamento de disco</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-xs-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="2" style="text-align: center">NATAÇÃO - MASCULINO E FEMININO</th>
                        </tr>
                        <tr>
                            <th style="text-align: center">PROVAS</th>
                            <th style="text-align: center">DATA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>25 m livre</td>
                            <td rowspan="10" style="vertical-align: middle; text-align: center">05/10</td>
                        </tr>
                        <tr><td>25 m costa</td></tr>
                        <tr><td>25 m peito</td></tr>
                        <tr><td>25 m borboleta</td></tr>
                        <tr><td>50 m livre</td></tr>
                        <tr><td>50 m costa</td></tr>
                        <tr><td>50 m peito</td></tr>
                        <tr><td>50 m borboleta</td></tr>
                        <tr><td>4 x 25 m livre</td></tr>
                        <tr><td>4 x 25 m livre misto</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
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