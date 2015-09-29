@extends('layouts.layout')
@section('css')

	<title>Título</title>

@stop
@section('content')
<body>
	<h1>Login</h1>

	<form action="/">
		<input type="text" placeholder="Usuario" />
		<input type="password" placeholder="Contraseña" />

		<button class="btn btn-primary btn-raised" type="button">Envíar</button>
	</form>
@stop
@section('scripts')
@stop
