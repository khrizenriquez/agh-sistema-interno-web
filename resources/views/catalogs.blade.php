@if(!App\Models\User::isLogged())
<?php redirect('/inicio'); ?>
@endif

@extends('layouts.layout')
@section('styles')

	<title>Catalogos</title>

@stop
@section('content')
<body>
	<h1>Catálogos</h1>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-2">
				<ul class="nav nav-pills nav-stacked">
				  	<li role="presentation" class="active">
				  		<a href="#">Departamentos</a>
				  	</li>
				  	<li role="presentation">
				  		<a href="#">Municipios</a>
				  	</li>
				  	<li role="presentation">
				  		<a href="#">Tipos de responsable</a>
				  	</li>
				  	<li role="presentation">
				  		<a href="#">Tipos de enfermedades</a>
				  	</li>
				</ul>
			</div>
			<div class="col-xs-12 col-md-10">
				<div class="panel panel-primary">
				    <div class="panel-heading">
				        <h3 class="panel-title">Panel primary</h3>
				    </div>
				    <div class="panel-body">
				        Panel content
				    </div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
<script src="/js/protos/login.js"></script>
<script src="/js/login.js"></script>
@stop
