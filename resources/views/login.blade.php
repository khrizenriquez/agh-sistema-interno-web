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
				<form action="/" class="form-horizontal" id="form-login">
					<fieldset>
						<div class="form-group field">
				            <div class="col-xs-12">
				                <input required type="text" class="form-control" id="user" name="user" placeholder="Email" maxlength="99" />
				            </div>
				            <span class="error"></span>
				        </div>
				        <div class="form-group field">
				            <div class="col-xs-12 col-md-8">
				                <input required type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" maxlength="99" />
				            </div>
				            <div class="col-xs-6 col-md-4">
								<button class="btn btn-primary btn-raised" type="submit">Envíar</button>
				            </div>

				            <span class="error"></span>
				        </div>

					</fieldset>
				</form>
			</div>
		</div>
	</div>
@stop
@section('scripts')
<script src="/js/protos/login.js"></script>
<script src="/js/login.js"></script>
@stop
