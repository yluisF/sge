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
                <div class="card-header">Registro de Datos Personales</div>

                <div class="card-body">

					<form method="post" action="{{ route('registrobd') }}">
						@csrf

						<div class="form-group" hidden="">
							<label for="email">Correo de Inicio De Sesión</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="email"
							id="email"
							value="{{ auth()->user()->email }}">
						</div>

						<div class="form-group">
							<label for="nombre">Nombre(s)</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="nombre"
							id="nombre"
							style="text-transform: capitalize;"
							value="{{ old('nombre') }}">
						</div>

						<div class="form-group">
							<label for="app">Apellido paterno</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="app"
							id="app"
							style="text-transform: capitalize;"
							value="{{ old('app') }}">
						</div>

						<div class="form-group">
							<label for="apm">Apellido Materno</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="text"
							name="apm"
							id="apm"
							style="text-transform: capitalize;"
							value="{{ old('apm') }}">
						</div>

						<div class="form-group">
							<label for="celular">Tel de Celuar</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="number"
							name="celular"
							id="celular"
							value="{{ old('celular') }}">
						</div>

						<div class="form-group">
							<label for="birthday">Fecha de Nacimiento</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="date"
							name="birthday"
							id="birthday"
							value="{{ old('birthday') }}">
						</div>

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
