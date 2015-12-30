@extends('layouts.layout')
@section('styles')

	<link rel="stylesheet" href="/styles/background.css" />

	<title>Inicio</title>

@stop
@section('content')
<body>
	<div class="container-back"></div>

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

<script src="/js/vendor/Vague.js/Vague.js"></script>
<script src="/js/protos/login.js"></script>
<script src="/js/login.js"></script>
<script src="/js/blur.js"></script>
@stop
