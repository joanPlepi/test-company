@extends('layouts.master')

@section('content')

<div class="container">

		@if($flash = session('message'))
			<div id="flash_msg" class="alert alert-success">
				{{ $flash }}
			</div>
			
		@endif

		<b><h1 style="text-align: center;">Register a new worker</h1></b>
		<br><br>
		<form method="POST" action="/add/worker">

			{{ csrf_field() }}

			<div class="row form-group form-group-lg">
				<label class="control-label col-sm-offset-2 col-sm-2" for="name" style="font-size: 14pt;"> Name </label>
				<div class="col-sm-4">
					<input type="text" name="name" class="form-control" id="name">
				</div> 
			</div>

			<br>

			<div class="row form-group form-group-lg">
				<label class="control-label col-sm-offset-2 col-sm-2" for="position" style="font-size: 14pt;"> Select the position </label>
				<div class="col-sm-4">
					      <select class="form-control" id="position" name="position">
					        @foreach($positions as $position)
					        	<option>{{$position->name}}</option>
					        @endforeach
					      </select>
				</div> 
			</div>

			<div class="row form-group form-group-lg">
				<label class="control-label col-sm-offset-2 col-sm-2" for="dep" style="font-size: 14pt;"> Select the dep </label>
				<?php $deps = App\Departament::all();?>
				<div class="col-sm-4">
					      <select class="form-control" id="dep" name="dep">
					      @foreach($deps as $dep)
					        <option>{{ $dep->name }}</option>
					      @endforeach
					      </select>
				</div> 
			</div>


			<br><br>
			<div class="row form-group">
				<div class="col-sm-offset-2">
					<button type="submit" class="btn btn-primary btn-lg">Add worker</button>
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