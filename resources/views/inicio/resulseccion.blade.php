@extends('adminlte::page')

@section('title', 'Inicio | Bienvenido')

@section('css')

@stop

@section('content_header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
@stop




@section('content')
<div class="row">
	<div class="col-12 col-sm-10 col-lg-10 mx-auto">

<a href="{{ route('seccion') }}">Regresar</a><hr>
<h2>Usuarios con el cargo: {{ $see->seccion }}</h2>
		<ul class="list-group">
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
				<li>NO hay Usuarios con la seccion: {{ $see->seccion }}</li>
			@endforelse
				<center>{{ $resultado->links() }}</center>
		</ul>
	</div>
</div>
@stop



@section('js')

@stop