@extends('layouts.master')

@section('content')
	<br>
	<div class="row">
		<div class="col-sm-offset-5"><h1> <b> Log in </b></h1></div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4">
			
			<form method="POST" action="/login">
				{{-- LOGIN FORMMMM --}}
				{{ csrf_field() }}

				<div class="form-group form-group-lg">
					<label class="control-label" for="email"> Email </label>
					<input type="email" name="email" class="form-control">
				</div>

				<div class="form-group form-group-lg">
					<label class="control-label" for="password">Password</label>
					<input type="password" name="password" class="form-control">
				</div>
				
				<br>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Log in</button>
				</div>

				@include('layouts.errors')
			</form>
		</div>
	</div>
	
@endsection