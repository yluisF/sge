@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')

@stop

@section('content_header')
		<a href="{{ route('seccicrear') }}"><button class="btn btn-success">Agregar Sección</button></a>
		<a href="{{ route('municrear') }}"><button class="btn btn-success">Agregar Municipio</button></a><hr>
    <center><h1>Nueva Municipio</h1></center>
@stop

@section('content')

<div class="row">
	<div class="col-12 col-sm-10 col-lg-10 mx-auto">
		<div class="d-flex justify-content-between align-items-center mb-3">
		</div><hr>
		<center>
			<form method="post" action="{{ route('municrear2') }}">
				@csrf
				<div class="form-group">
					<label for="clv_municipio">Clave del Municipio: </label>
					<input class="borde-0 bg-light shadow-sm" type="text" name="clv_municipio" value="{{ old('clv_municipio') }}">
				</div>
				<div class="form-group">
					<label for="nombre_municipio">Nombre del Municipio: </label>
					<input class="borde-0 bg-light shadow-sm" type="text" name="nombre_municipio" value="{{ old('nombre_municipio') }}">
				</div>

				<button class="btn btn-info">Agregar</button>

						@if($errors->any())
							<div class="alert alert-danger">
								<ul class="m-0">
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

			</form>

		</center>
	</div>
</div>

@stop