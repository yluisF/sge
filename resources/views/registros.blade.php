@extends('layouts.app')

@section('title', 'Registro')

@section('css')

@stop

@section('content_header')
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de Información de Afiliados</div>

                <div class="card-body">

					<form method="post" action="{{ route('registronbd') }}">
						@csrf

						<div class="form-group">
							<label for="fol_afil">Folio de Afiliado</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="number"
							name="fol_afil"
							id="fol_afil"
							value="{{ old('fol_afil') }}">
						</div>

						<div class="form-group">
							<label for="clv_elector">Clave del Elector</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="clv_elector"
							id="clv_elector"
							style="text-transform: uppercase"
							value="{{ old('clv_elector') }}">
						</div>

						<div class="form-group">
							<label for="folio_ine">Folio de tu INE</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="number"
							name="folio_ine"
							id="folio_ine"
							value="{{ old('folio_ine') }}">
						</div>

						<div class="form-group">
							<label for="fecha_afi">Fecha de Afiliacion al PRI</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="date"
							name="fecha_afi"
							id="fecha_afi"
							value="{{ old('fecha_afi') }}">
						</div>

						<div class="form-group">
							<label for="distro_fed">Distrito Federal</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="distro_fed"
							id="distro_fed"
							value="{{ old('distro_fed') }}"
							style="text-transform: uppercase">
						</div>

						<select class="custom-select custom-select-lg mb-3" name="seccion_id">
						  	<option selected>-- Selecciona Tu Seccion --</option>
						@forelse($seccion as $seccionItem)
						  	<option value="{{ $seccionItem->id_seccion }}">{{ $seccionItem->seccion }}</option>
						@empty
						 	<option value="">Sin Secciones Disponibles</option>
						@endforelse
						</select>

						@forelse($persona as $personaItem)
							<div class="form-group" hidden="">
								<label for="persona_id">Persona id</label>
								<input class="form-control borde-0 bg-light shadow-sm"
								type="text"
								name="persona_id"
								id="persona_id"
								value="{{ $personaItem->id_persona }}">
							</div>
						@empty
							NO existe el Usuario
						@endforelse

						<select class="custom-select custom-select-lg mb-3" name="jerarquia_id">
						  	<option selected>-- Selecciona Tu Cargo --</option>
						@forelse($jerarquia as $jerarquiaItem)
						  	<option value="{{ $jerarquiaItem->id_jerarquia }}">{{ $jerarquiaItem->cargo }}</option>
						@empty
						 	<option value="">Sin Cargos Disponibles</option>
						@endforelse
						</select>

						@if($errors->any())
							<div class="alert alert-danger">
								<ul class="m-0">
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<button class="btn btn-primary btn-lg btn-block"> Enviar </button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop



@section('js')

@stop
