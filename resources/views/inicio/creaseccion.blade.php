@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')

@stop

@section('content_header')
		<a href="{{ route('colicrear') }}"><button class="btn btn-success">Agregar Colonia</button></a>
		<a href="{{ route('municrear') }}"><button class="btn btn-success">Agregar Municipio</button></a><hr>
    <center><h1>Nueva Sección</h1></center>
@stop

@section('content')

<div class="row">
	<div class="col-12 col-sm-10 col-lg-10 mx-auto">
		<div class="d-flex justify-content-between align-items-center mb-3">
		</div><hr>
		<center>
			<form method="post" action="{{ route('seccicrear2') }}">
				@csrf
				<div class="form-group">
					<label for="seccion">Número de Sección</label>
					<input class="borde-0 bg-light shadow-sm" type="number" name="seccion" value="{{ old('seccion') }}">
				</div>
				<button class="btn btn-info">Agregar</button>
			</form>
						@if($errors->any())
							<div class="alert alert-danger">
								<ul class="m-0">
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

		</center>
	</div>
</div>

@stop



@section('js')