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

					<form method="post" action="{{ route('actualizandop', auth()->user()->email) }}">
						@csrf @method('patch')

						<h3>Unicamente puedes actualizar tu Número telefónico</h3>
						<div class="form-group">
							<label for="celular">Tel de Celuar</label>
							<input class="form-control borde-0 bg-light shadow-sm"
							type="number"
							name="celular"
							id="celular"
							value="{{ $usuario->celular }}">
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

						<button class="btn btn-primary btn-lg btn-block">Actualizar</button>
					</form>
                </div>
            </div>
        </div>
    </div>

@stop



@section('js')

@stop