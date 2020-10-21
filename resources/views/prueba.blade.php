@extends('adminlte::page')

@section('title', 'Inicio | Bienvenido')

@section('css')

@stop

@section('content_header')
    <div class="input-group">
        <input class="form-control form-control-navbar" type="text" id="texto" placeholder="Buscar Afiliado" aria-label="Buscar Afiliado ">
        <div class="input-group-append">
                <a href="{{ route('formbusca') }}">
                	<span class="input-group-text"><i class="fas fa-search"></i></span>
                </a>
        </div>
    </div>
</form>
@stop

@section('content')
<div class="row">
	<div class="col-12 col-sm-10 col-lg-10 mx-auto">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<h1 class="display-6 mb-0">Usuarios Afiliados</h1>
		</div><hr>

		<a href="{{ route('seccicrear') }}"><button class="btn btn-success">Agregar Sección</button></a>
		<a href="{{ route('colicrear') }}"><button class="btn btn-success">Agregar Colonia</button></a>
		<a href="{{ route('municrear') }}"><button class="btn btn-success">Agregar Municipio</button></a><hr>
<div id="resultados"></div>
		<ul class="list-group">
			@forelse($llamausers as $llamausersItem)
				<li class="list-group-item border-0 mb-3 shadow-sm list-group-item-danger">
					<a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('muestrausuario', $llamausersItem) }}">
						<span class="font-weight-bold">
							Usuario:  {{  $llamausersItem->nombre }} {{  $llamausersItem->app }} {{  $llamausersItem->apm }} <br>
							Con correo Electrónico: {{ $llamausersItem->email }} <br>
							Fecha de Nacimiento: {{ $llamausersItem->birthday }}
						</span>

						<span class="text-black-50">
						Fecha de alta en el sistema: {{ $llamausersItem->created_at->format('d-m-Y') }}
						</span></a>
				</li>
			@empty
				<li>NO se encontraron resultados</li>
			@endforelse
				<center>{{ $llamausers->links() }}</center>
		</ul>
	</div>
</div>
@stop



@section('js')

@stop