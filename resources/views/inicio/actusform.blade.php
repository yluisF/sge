@extends('adminlte::page')

@section('title', 'Inicio | Dirección')

@section('css')

@stop

@section('content_header')
    <center><h1>{{ auth()->user()->name }}</h1></center>
@stop

@section('content')

<div class="row">
	<div class="col-12 col-sm-10 col-lg-10 mx-auto">
		<div class="d-flex justify-content-between align-items-center mb-3">
		</div><hr>
		<center>
			<a href=" {{ route('actualizadirecciones', $resul->persona_id) }}">
				<button class="btn btn-info">
					Ver mis Dirección para Actualizar
				</button>
			</a>
		</center>
	</div>
</div>

@stop



@section('js')

@stop
