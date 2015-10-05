@extends('layouts.layout')
@section('styles')

	<title>Inicio</title>

@stop
@section('content')
<body>
	<h1>Inicio</h1>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div>
					<a href="/catalogos">Catálogos</a>
				</div>
				<div>
					<a href="/perfil">Perfil</a>
				</div>
				<div>
					<a href="/pacientes">Pacientes</a>
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
<script src="/js/protos/login.js"></script>
<script src="/js/login.js"></script>
@stop
