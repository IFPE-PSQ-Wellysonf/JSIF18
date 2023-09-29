@extends('admin.relat.template')

@section('titulo', 'Relação de Inscritos por Campus para diárias')

@section('corpo')
    @php $primeira = TRUE; @endphp
    @foreach($campi as $campus)
		@if($primeira)
			@php $primeira = FALSE; @endphp
		@else
			<div class="page-break"></div>
		@endif
		<header>
			<img src="img/logo.PNG" style="height: 2cm;">
			<p>Instituto Federal de Educação, Ciência e Tecnologia de Pernambuco</p>
			<p>{{ config('app.name') }}</p>
			<h2><i>Campus</i>  {{ $campus->campus }}</h2>
			@if (env('RELATORIOS_INSC_FINAL', true))
                <h1>Relação de inscritos</h1>
            @else
                <h1>Relação de pré-inscritos</h1>
            @endif
		</header>
		
		@foreach($datas as $dia => $modalidades)
			<section>
				<h2><i>Dia</i>  {{ $dia }}</h2>
				@if(count($inscritos->whereIn('modalidade_id', $modalidades)->where('user.campus_id', $campus->id)->where('user.solicitou_diarias',TRUE)) > 0 )
					<h3>Quantidade total de inscritos que solicitou diárias: <b>{{ count($inscritos->whereIn('modalidade_id', $modalidades)->where('user.campus_id', $campus->id)->where('user.solicitou_diarias',TRUE)->unique('user_id')) }}</b></h3>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>SIAPE</th>
								<th>Nome</th>
								<th>Idade</th>
								<th>Sexo</th>
							</tr>
						</thead>
						@php
							$cont = 1;
						@endphp
						<tbody>
							@foreach($inscritos->whereIn('modalidade_id', $modalidades)->where('user.campus_id', $campus->id)->where('user.solicitou_diarias',TRUE)->sortBy('user.nomeAnsi')->unique('user_id') as $inscrito)
								<tr>
									<td class='centralizar'>{{ $cont++ }}</td>
									<td class='centralizar'>{{ $inscrito->user->siape }}</td>
									<td>{{ $inscrito->user->name }}</td>
									<td>{{ $inscrito->user->idade }}</td>
									<td>{{ $inscrito->user->sexo }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<h3 class="erro"><b>Obs.:</b> Não há inscritos neste <i>Campus</i> nesta data</h3>
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
	@endforeach
@stop
				