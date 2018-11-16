@extends('layouts.master')

@section('content')

<p>Je verifie si tout marche normalement!</p>

@endsection

@section('form')

	<form action="/index" method="post">
		{{csrf_field()}}
		<label>Entrer votre nom</label>
		<input type="text" name="nom">
		<label>Entrer votre email</label>
		<input type="email" name="email" required="required">

		<input type="submit" name="submit" class="btn btn-primary" required="required">
	</form>
@endsection

@section('get')

<div>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
@endsection