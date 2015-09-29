@extends('layouts.layout')
@section('styles')

	<title>Inicia sesión</title>

@stop
@section('content')
<body>
	<h1>Login</h1>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-4 col-md-offset-4">
				<form action="/" class="form-horizontal">
					<fieldset>
						 <div class="form-group">
				            <!-- <label for="email" class="col-lg-3 control-label">Email</label> -->
				            <div class="col-xs-12">
				                <input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="99" />
				            </div>
				        </div>
				        <div class="form-group">
				            <!-- <label for="password" class="col-lg-2 control-label">Contraseña</label> -->
				            <div class="col-xs-12 col-md-8">
				                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" maxlength="99" />
				            </div>
				            <div class="col-xs-6 col-md-4">
								<button class="btn btn-primary btn-raised" type="button">Envíar</button>
				            </div>
				        </div>

					</fieldset>
				</form>
			</div>
		</div>
	</div>
@stop
@section('scripts')
@stop
