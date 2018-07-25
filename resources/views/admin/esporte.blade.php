@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/Datatables-1.10.16/jquery.dataTables.min.css') }}">
@stop

@section('title', 'Jogos Servidores IFPE')

@section('content_header')
    <h1>Jogos dos Servidores IFPE 2018</h1>
    <h3>{{$modalidade->modalidade}}</h3>
    <h4>Total de inscritos {{count($inscricoes)}}</h4>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="hidden-xs hidden-sm">Email</th>
                        <th class="hidden-xs hidden-sm">Residente</th>
                        <th>Hospedagem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inscricoes as $inscricao)
                    <tr>
                        <td>{{$inscricao->user->name}}</td>
                        <td class="hidden-xs hidden-sm">{{$inscricao->user->email}}</td>
                        <td class="hidden-xs hidden-sm">{{$inscricao->user->endereco_municipio}}</td>
                        @if(in_array(strtoupper($inscricao->user->endereco_municipio), $rmr))
                        <td>Reside na região metropolitana</td>
                        @else
                        <td>{{$inscricao->user->diaria}}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/Datatables-1.10.16/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('.table').DataTable({
                        language: {
                            "decimal":        "",
                            "emptyTable":     "Nenhum atleta cadastrado.",
                            "info":           "Exibindo _START_ até _END_ de _TOTAL_ atletas.",
                            "infoEmpty":      "Nenhum atleta para exibir.",
                            "infoFiltered":   "(filtrado de _MAX_ total de atletas.)",
                            "infoPostFix":    "",
                            "thousands":      ",",
                            "lengthMenu":     "Exibindo _MENU_ atletas.",
                            "loadingRecords": "Carregando...",
                            "processing":     "Processando...",
                            "search":         "Buscar:",
                            "zeroRecords":    "A busca não encontrou resultados",
                            "paginate": {
                                "first":      "Primeiro",
                                "last":       "Último",
                                "next":       "Próximo",
                                "previous":   "Anterior"
                            },
                        },
                        pageLength: 10,
                        "bLengthChange" : true,
                        "order": [[ 0, "asc" ]],
                        
                    });
        } );
    </script>
@stop