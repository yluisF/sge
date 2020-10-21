@extends('adminlte::page')

@section('title', 'Inicio | Personal')

@section('css')

@stop

@section('content_header')
    <center><h1>Datos Personales</h1></center>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card-body">

					<form method="post" action="{{ route('actualizandod', $direccion->persona_id) }}">
						@csrf @method('patch')

						<h3>Ubicación</h3>

						<div class="form-group">
							<label for="direccion">Dirección</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="direccion"
							id="direccion"
							value="{{ old('direccion', $direccion->direccion) }}">
						</div>

						<div class="form-group">
							<label for="no_int">No. Interior</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="no_int"
							id="no_int"
							value="{{ old('no_int', $direccion->no_int) }}">
						</div>

						<div class="form-group">
							<label for="no_ext">No. Exterior</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="no_ext"
							id="no_ext"
							value="{{ old('no_ext', $direccion->no_ext) }}">
						</div>

						<div class="form-group">
							<label for="localidad">Localidad</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="localidad"
							id="localidad"
							value="{{ old('localidad', $direccion->localidad) }}">
						</div>

						<div class="form-group">
							<label for="cp">Código Postal</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="cp"
							id="cp"
							value="{{ old('cp', $direccion->cp) }}">
						</div>

						<select class="custom-select custom-select-lg mb-3" name="colonia_id">
						  	<option value="{{ $direccion->colonia_id }}">{{ $col->colo }}</option>
						@forelse($colonia as $coloniaItem)
						  	<option value="{{ $coloniaItem->id_colonia }}">{{ $coloniaItem->colonia }}</option>
						@empty
						 	<option value="">Sin Colonias Disponibles</option>
						@endforelse
						</select>

						<select class="custom-select custom-select-lg mb-3" name="municipio_id">
						  	<option value="{{ $direccion->municipio_id }}">{{ $mun->mono }}</option>
						@forelse($municipio as $municipioItem)
						  	<option value="{{ $municipioItem->id_municipio }}">{{ $municipioItem->nombre_municipio }}</option>
						@empty
						 	<option value="">Sin Municipios Disponibles</option>
						@endforelse
						</select>

						<input type="text" name="latitud" value="null" hidden="">

						<input type="text" name="longitud" value="null" hidden="">

						@if($errors->any())
							<div class="alert alert-danger">
								<ul class="m-0">
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<button class="btn btn-primary btn-lg btn-block">Actualizar mi Ubicación</button>
					</form>
                </div>
            </div>
        </div>
    </div>

@stop



@section('js')

@stop