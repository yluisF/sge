@extends('adminlte::page')

@section('title', 'Inicio | Municipio')

@section('css')

@stop

@section('content_header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
@stop




@section('content')
<div class="row">
	<div class="col-12 col-sm-10 col-lg-10 mx-auto">

		<div class="d-flex justify-content-between align-items-center mb-3">
			<form method="post" action=" {{ route('buscamunicipio') }}">
				@csrf
				<select class="custom-select custom-select-lg mb-3" name="municipio" id="municipio">
					<option selected>-- Selecciona Un Municipio --</option>
					@forelse($municipio as $municipioItem)
					  			<option value="{{ $municipioItem->id_municipio }}">{{ $municipioItem->nombre_municipio }}</option>
					@empty
					 	<option value="">NO hay municipios disponibles</option>
					@endforelse
				</select>
				<button>Buscar</button>
			</form>
		</div><hr>

		<ul class="list-group">
			@forelse($llamausers as $llamausersItem)
				<li class="list-group-item border-0 mb-3 shadow-sm list-group-item-danger">
					<a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('muestrausuario', $llamausersItem) }}">
						<span class="font-weight-bold">
							Usuario:  {{  $llamausersItem->nombre }} {{  $llamausersItem->app }} {{  $llamausersItem->apm }} <br>
							Con correo Electrónico: {{ $llamausersItem->email }} <br>
							Fecha de Nacimiento: {{ $llamausersItem->birthday }}
						</span>

						<span class="text-black-50">
						Fecha de alta en el sistema: {{ $llamausersItem->created_at->format('d-m-Y') }}
						</span></a>
				</li>
			@empty
				<li>NO hay Usuarios Registrados</li>
			@endforelse
				<center>{{ $llamausers->links() }}</center>
		</ul>
	</div>
</div>
@stop



@section('js')

@stop