@extends('adminlte::page')

@section('title', 'Inicio | Personal')

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
			<a href="{{ route('actualizapersonales', auth()->user()->email) }}">
				<button class="btn btn-info">
					Ver mis Datos Personales para Actualizar
				</button>
			</a>
		</center>
	</div>
</div>

@stop



@section('js')

@stop
