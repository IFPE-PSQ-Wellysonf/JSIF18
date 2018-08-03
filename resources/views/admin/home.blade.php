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
                        <th>&nbsp;</th>
                        <th>Inscrições</th>
                        <th>RMR</th>
                        <th>Demais Regiões</th>
                        <th>Solicitou hospedagem</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Feminino</th>
                        <td>{{count($insc_group->where('user.sexo','F')) }}</td>
                        <td>{{count($insc_group->where('user.sexo','F')->whereIn('user.endereco_municipio',$rmr)) }}</td>
                        <td>{{count($insc_group->where('user.sexo','F')->whereNotIn('user.endereco_municipio',$rmr)) }}</td>
                        <td>{{count($insc_group->where('user.sexo','F')->whereNotIn('user.endereco_municipio',$rmr)->where('user.solicitou_diarias',TRUE)) }}</td>
                    </tr>
                    <tr>
                        <th>Masculino</th>
                        <td>{{count($insc_group->where('user.sexo','M')) }}</td>
                        <td>{{count($insc_group->where('user.sexo','M')->whereIn('user.endereco_municipio',$rmr)) }}</td>
                        <td>{{count($insc_group->where('user.sexo','M')->whereNotIn('user.endereco_municipio',$rmr)) }}</td>
                        <td>{{count($insc_group->where('user.sexo','M')->whereNotIn('user.endereco_municipio',$rmr)->where('user.solicitou_diarias',TRUE)) }}</td>
                    </tr>
                </tbody>
            </table>
            <p class="help-block">*RMR - Região Metropolitana do Recife.</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Campus</th>
                        <th>Homens</th>
                        <th>Mulheres</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campi as $campus)
                    <tr>
                        <td>{{$campus->campus}}</td>
                        <td>{{count($insc_group->where('user.sexo','M')->where('user.campus_id',$campus->id))}}</td>
                        <td>{{count($insc_group->where('user.sexo','F')->where('user.campus_id',$campus->id))}}</td>
                        <td>{{count($insc_group->where('user.campus_id',$campus->id))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6 col-xs-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Modalidade</th>
                        <th>Qtd Inscritos</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sum_inscricoes = 0;
                    @endphp
                    @foreach($inscricoes as $inscricao)
                    <tr>
                        <td><a href="{{route('esporte',$modalidades->where('id',$inscricao->modalidade_id)->first() )}}">{{$modalidades->where('id',$inscricao->modalidade_id)->first()->modalidade}}</a></td>
                        <td>{{$inscricao->qtd}}</td>
                        @php
                            $sum_inscricoes += $inscricao->qtd;
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h3 class="text-danger">Total de inscrições {{ $sum_inscricoes }}</h3>
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