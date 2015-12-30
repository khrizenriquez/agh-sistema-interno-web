@extends('layouts.layout')
@section('styles')
	<link rel="stylesheet" href="/styles/catalogs.css">
	<link rel="stylesheet" href="/js/vendor/jquery-ui/jquery-ui.min.css" />
	<link rel="stylesheet" href="/js/vendor/jtable/themes/metro/blue/jtable.min.css" />

	<title>Pacientes</title>

@stop
@section('content')
<body>
	<div class="container">
		<div class="row">
			<h1>Pacientes</h1>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">

				<div class="panel panel-primary">
				    <div class="panel-heading">
				        <h3 class="panel-title">Pacientes</h3>
				    </div>

				    <div id="patientsCatalog" class="panel-body"></div>
				</div>

			</div>
		</div>
	</div>
@stop

@section('scripts')

<script src="/js/protos/login.js"></script>

<script src="/js/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="/js/vendor/jtable/jquery.jtable.min.js"></script>
<script src="/js/vendor/jtable/localization/jquery.jtable.es.js"></script>

<script src="/js/patients.js"></script>

@stop
