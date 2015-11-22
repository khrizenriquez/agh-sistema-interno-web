@if(!App\Models\User::isLogged())
<?php redirect('/inicio'); ?>
@endif

@extends('layouts.layout')
@section('styles')
	<script src="/js/vendor/jtable/themes/metro/blue/jtable.min.css"></script>

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

	<!-- Option modal -->
	<div id="catalogsModal" class="modal fade" tabindex="-1" role="dialog">
	  	<div class="modal-dialog">
			<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h3 class="modal-title">¿Qué deseas hacer?</h3>
		      	</div>

		      	<div class="modal-body">
		      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic at commodi in tempore perferendis sequi ullam repudiandae dolores porro, quos provident velit consectetur dolore quibusdam asperiores, fugiat tempora possimus. Illum.</p>
		      	</div>

		      	<div class="modal-footer">
		        	<button role="button" class="btn btn-info" ng-click="seeDepartment()">Ver</button>
		        	<button type="button" class="btn btn-default" ng-click="updateDepartment()">Editar</button>
		        	<button id="catalogsDesactivate" type="button" class="btn btn-danger" ng-click="deleteDepartment()">Desactivar</button>
		        	<button id="catalogsActivate" type="button" class="btn btn-success" ng-click="activeDepartment()">Activar</button>
		      	</div>
		    </div>
	  	</div>
	</div>
@stop

@section('scripts')
<script src="/js/models/catalogsService.js"></script>
<script src="/js/controllers/catalogsController.js"></script>
<script src="/js/protos/login.js"></script>
<script src="/js/login.js"></script>
<script src="/js/vendor/jtable/jquery.jtable.min.js"></script>
<script src="/js/vendor/jtable/localization/jquery.jtable.es.js"></script>
@stop
