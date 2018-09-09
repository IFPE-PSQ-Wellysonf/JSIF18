@extends('admin.relat.template')

@section('titulo', 'Relação de Inscritos para controle de hospedagem')

@section('corpo')
    @php $primeira = TRUE;@endphp
    @foreach($datas as $dia => $modalidades)
        @if($primeira)
            @php $primeira = FALSE; @endphp
        @else
            <div class="page-break"></div>
        @endif
        <header>
            <img src="img/logo.PNG" style="height: 2cm;">
            <p>Instituto Federal de Educação, Ciência e Tecnologia de Pernambuco</p>
            <p>{{ config('app.name') }}</p>
        </header>
        <section>
            <h1>Relação de inscritos</h1>
            <h2><i>Dia</i>  {{ $dia }}</h2>
            @if(count($inscritos->whereIn('modalidade_id', $modalidades)) > 0 )
                <h3>Quantidade total de inscritos: <b>{{ count($inscritos->whereIn('modalidade_id', $modalidades)) }}</b></h3>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SIAPE</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    @php
                        $cont = 1;
                    @endphp
                    <tbody>
                        @foreach($inscritos->whereIn('modalidade_id', $modalidades)->sortBy('user.nomeAnsi') as $inscrito)
                            <tr>
                                <td class='centralizar'>{{ $cont++ }}</td>
                                <td class='centralizar'>{{ $inscrito->user->siape }}</td>
                                <td>{{ $inscrito->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="erro"><b>Obs.:</b> Não há inscritos neste <i>Campus</i></h3>
            @endif
        </section>
        <footer>
            <div class="esquerda">
                <span>Relação gerada em {{ date('d/m/Y h:m:i') }}</span>
            </div>
            <div class="direita">
                <a href="{{ config('app.url') }}">{{ config('app.url') }}</a>
            </div>
        </footer>
    @endforeach
@stop