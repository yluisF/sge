@extends('adminlte::page')

@section('title', 'Inicio | Usuario')

@section('css')

@stop

@section('content_header')
    <center><h1>Datos de Afiliado</h1></center>
@stop

@section('content')
<div class="container">
	<div class="bg-white p-5 shadow rounded">

	<h2>
		{{ $persona->nombre }} {{ $persona->app }} {{ $persona->apm }}
	</h2>
		<table class="table table-sm table-bordered">
		  <thead style="text-align: center;">
		    <tr class="table-danger">
		      <th scope="col">Folio de afiliado</th>
		      <th scope="col">Clave Elector</th>
		      <th scope="col">Folio Ine</th>
		      <th scope="col">Afiliado el Día</th>
		      <th scope="col">Distrito Federal</th>
		      <th scope="col">Sección</th>
		      <th scope="col">Cargo</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr class="table-info" style="text-align: center;">
		      <th scope="row">{{ $afiliado->fol_afil }}</th>
		      <td>{{ $afiliado->clv_elector }}</td>
		      <td>{{ $afiliado->folio_ine}}</td>
		      <td>{{ $afiliado->fecha_afi}}</td>
		      <td>{{ $afiliado->distro_fed}}</td>
		      <td>{{ $seccion->sec}}</td>
		      <td>{{ $jerarquia->car }}</td>
		    </tr>
		  </tbody>
		</table>

		<div class="d-flex justify-content-between align-items-center">
			<div class="btn-group btn-group-sm">
				<a class="btn btn-primary"
				href="">
					Ver Ubicación
				</a>
			</div>

		<form method="post" action=" {{ route('borraruser', $persona->id_persona) }} ">
			@csrf @method('delete')
			<div class="btn-group btn-group-sm">
				<button class="btn btn-danger">
					Depurar Afiliado
				</button>
			</div>
		</form>
	</div>
</div>
@stop



@section('js')

@stop
