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

<a href="{{ route('colonia') }}">Regresar</a><hr>

		<ul class="list-group">
			<h2>Colonia {{ $col->colonia }}</h2>
			@forelse($resultado as $resultadoItem)

				<li class="list-group-item border-0 mb-3 shadow-sm list-group-item-danger">
					<a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('muestrausuario', $resultadoItem) }}">
						<span class="font-weight-bold">
							Usuario:  {{  $resultadoItem->nombre }} {{  $resultadoItem->app }} {{  $resultadoItem->apm }} <br>
							Con correo Electrónico: {{ $resultadoItem->email }} <br>
							Fecha de Nacimiento: {{ $resultadoItem->birthday }}
						</span>

						<span class="text-black-50">
						Fecha de alta en el sistema: {{ $resultadoItem->created_at->format('d-m-Y') }}
						</span></a>
				</li>
			@empty
				<li>NO hay Usuarios de la Colonia: {{ $col->colonia }}</li>
			@endforelse
				<center>{{ $resultado->links() }}</center>
		</ul>
	</div>
</div>
@stop



@section('js')

@stop