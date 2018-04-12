@extends('layouts.master')

@section('content')

	<div class="container">

		<h1>Register</h1>
		<br>
		<form method="POST" action="/register" enctype="multipart/form-data">

			{{ csrf_field() }}

			<div class="form-group">
				<label class="control-label col-sm-2" for="name"> Name </label>
				<div class="col-sm-6">
					<input type="text" name="name" class="form-control" id="name">
				</div> 
				<span class="col-sm-offset-4"></span>
			</div>


			<div class="form-group">
				<label class="control-label col-sm-2" for="surname"> Surname </label>
				<div class="col-sm-6">
					<input type="text" name="surname" class="form-control" id="surname">
				</div> 
				<span class="col-sm-offset-4"></span>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="email"> Email </label>
				<div class="col-sm-6">
					<input type="email" class="form-control" name="email" id="email">
				</div>
				<span class="col-sm-offset-4"></span>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="address"> Address </label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="address" id="address">
				</div>
				<span class="col-sm-offset-4"></span>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="password"> Password </label>
				<div class="col-sm-6">
					<input type="password" class="form-control" name="password" id="password">
				</div>
				<span class="col-sm-offset-4"></span>
			</div>


			<div class="form-group">
				<label class="control-label col-sm-2" for="password_confirmation"> Password Confirm </label>
				<div class="col-sm-6">
					<input type="password" class="form-control" name="password_confirmation" 
					id="password_confirmation">
				</div>
				<span class="col-sm-offset-4"></span>
			</div>

			<br>
			<div class="form-group">
				<label class="control-label col-sm-2" for="file"> Upload image </label>
				<div class="col-sm-6">
					<input type="file" name="file" id="file">
				</div>
				<span class="col-sm-offset-4"></span>
			</div>

			<br><br>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Register</button>
			</div>

			@include('layouts.errors')

		</form>

	</div>

@endsection