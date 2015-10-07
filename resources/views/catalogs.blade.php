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

					<form action="" method="post" class="form-horizontal panel-body">
						<fieldset>
							<div class="form-group">
					            <div class="col-xs-12 col-md-4">
					                <input type="text" class="form-control" id="search" placeholder="Buscar" />
					            </div>
					        </div>

					        <div class="form-group">
					        	<div class="col-xs-12 col-md-8">
					        		<button type="button" class="btn btn-success btn-raised">Crear</button>
					        	</div>
					        </div>
						</fieldset>
					</form>

				    <div class="panel-body">
				        <table class="table table-striped table-hover">
						    <thead>
						        <tr>
						            <th>#</th>
						            <th>Column heading</th>
						            <th>Column heading</th>
						            <th>Column heading</th>
						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						            <td>1</td>
						            <td>Column content</td>
						            <td>Column content</td>
						            <td>Column content</td>
						        </tr>
						        <tr>
						            <td>2</td>
						            <td>Column content</td>
						            <td>Column content</td>
						            <td>Column content</td>
						        </tr>
						        <tr class="info">
						            <td>3</td>
						            <td>Column content</td>
						            <td>Column content</td>
						            <td>Column content</td>
						        </tr>
						        <tr class="success">
						            <td>4</td>
						            <td>Column content</td>
						            <td>Column content</td>
						            <td>Column content</td>
						        </tr>
						        <tr class="danger">
						            <td>5</td>
						            <td>Column content</td>
						            <td>Column content</td>
						            <td>Column content</td>
						        </tr>
						        <tr class="warning">
						            <td>6</td>
						            <td>Column content</td>
						            <td>Column content</td>
						            <td>Column content</td>
						        </tr>
						        <tr class="active">
						            <td>7</td>
						            <td>Column content</td>
						            <td>Column content</td>
						            <td>Column content</td>
						        </tr>
						    </tbody>
						</table>
				    </div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
<script src="/js/vendor/angularJS/angular.min.js"></script>
<script src="/js/vendor/angularJS/angular-route.min.js"></script>
<script src="/js/protos/login.js"></script>
<script src="/js/login.js"></script>
@stop
