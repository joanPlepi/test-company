@extends('layouts.master')

@section('content')
	<div class="container">

		@if($flash = session('message'))
			<div id="flash_msg" class="alert alert-success">
				{{ $flash }}
			</div>
		@endif

		<b><h1 style="text-align: center;">Register a new position title</h1></b>
		<br><br>
		<form method="POST" action="/add/workerPosition">

			{{ csrf_field() }}

			<div class="row form-group form-group-lg">
				<label class="control-label col-sm-offset-2 col-sm-2" for="name" style="font-size: 14pt;"> Position Title </label>
				<div class="col-sm-4">
					<input type="text" name="name" class="form-control" id="name" required>
				</div> 
			</div>

			<br>

			<br><br>
			<div class="row form-group">
				<div class="col-sm-offset-2">
					<button type="submit" class="btn btn-primary btn-lg">Add position</button>
				</div>
			</div>

			@include('layouts.errors')

		</form>

	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#flash_msg').fadeOut(4000);
		});
	</script>

@endsection