@extends('layouts.master')

@section('content')
	<h1 style="text-align: center; text-decoration: underline;"> Your profile</h1>
	<br><br>
	<div class="row" style="margin: 20px; font-size: 16pt;">
		<div class="col-sm-offset-4 col-sm-1">
			<b>Name: </b>
		</div>
		<div class="col-sm-2">
			{{auth()->user()->name}}
		</div>
	</div>

	<div class="row" style="margin: 20px; font-size: 16pt;">
		<div class="col-sm-offset-4 col-sm-1">
			<b>Surname: </b>
		</div>
		<div class="col-sm-2">
			{{auth()->user()->surname}}
		</div>
	</div>

	<div class="row" style="margin: 20px; font-size: 16pt;">
		<div class="col-sm-offset-4 col-sm-1">
			<b>Address: </b>
		</div>
		<div class="col-sm-2">
			{{auth()->user()->address}}
		</div>
	</div>

	<div class="row" style="margin: 20px; font-size: 16pt;">
		<div class="col-sm-offset-4 col-sm-1">
			<b>Email: </b>
		</div>
		<div class="col-sm-2">
			{{auth()->user()->email}}
		</div>
	</div>

	<div class="row" style="margin: 20px; font-size: 16pt;">
		<div class="col-sm-offset-4 col-sm-1">
			<b>Image: </b>
		</div>
		<div class="col-sm-2">
			<img src={{URL::asset($path)}} alt="Couldnt load" width="250" height="170">
		</div>
	</div>
	
	<br>
	<div class="row" >
		<div class="col-sm-offset-4 col-sm-1">
			<a href="/edit"><button class="btn btn-primary btn-lg">Edit</button></a>
		</div>
	</div>
	
@endsection