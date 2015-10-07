@if(!App\Models\User::isLogged())
<?php redirect('/inicio'); ?>
@endif

@extends('layouts.layout')
@section('styles')

	<title>Catalogos</title>

@stop
@section('content')
<body ng-app="catalogs">
	<h1>Catálogos</h1>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-2">
				<ul class="nav nav-pills nav-stacked" ng-controller="DepartmentsCtrl">
				  	<li role="presentation" class="active">
				  		<a href="#/departamentos">Departamentos</a>
				  	</li>
				  	<li role="presentation">
				  		<a href="#/">Municipios</a>
				  	</li>
				  	<li role="presentation">
				  		<a href="#/">Tipos de responsable</a>
				  	</li>
				  	<li role="presentation">
				  		<a href="#/">Tipos de enfermedades</a>
				  	</li>
				</ul>
			</div>
			<div class="col-xs-12 col-md-10">
				<div ng-view></div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
<script src="/js/vendor/angularJS/angular.min.js"></script>
<script src="/js/vendor/angularJS/angular-route.min.js"></script>
<script src="/js/catalogs.js"></script>
@stop
