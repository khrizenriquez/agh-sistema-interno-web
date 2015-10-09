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
				<ul class="nav nav-pills nav-stacked" ng-controller="HeaderCtrl">
				  	<li role="presentation" ng-class="{active: nav.isActive('/departamentos')}">
				  		<a href="#/departamentos">Departamentos</a>
				  	</li>
				  	<li role="presentation" ng-class="{active: nav.isActive('/municipios')}">
				  		<a href="#/municipios">Municipios</a>
				  	</li>
				  	<li role="presentation" ng-class="{active: nav.isActive('/responsables')}">
				  		<a href="#/responsables">Tipos de responsable</a>
				  	</li>
				  	<li role="presentation" ng-class="{active: nav.isActive('/enfermedades')}">
				  		<a href="#/enfermedades">Tipos de enfermedades</a>
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
<script src="/js/models/catalogsService.js"></script>
<script src="/js/controllers/catalogsController.js"></script>
@stop
