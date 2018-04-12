@extends('layouts.master')

@section('content')
	
	<div class="container">
		@include('layouts.alert')

		<h1>Departament {{$dep->name}}</h1>
		<br><br><br>

		<div class="row">
				
				<div class="col-sm-offset-4 col-sm-6">

					<form method="POST" action="/deps/{{ $dep->id }}">

						{{csrf_field()}}
						
						<div class="form-group row form-group-lg" style="font-size: 16pt;">
							<div class="col-sm-3"><label class="control-label" for="name">Id</label></div>
							<div class="col-sm-6"><input class="form-control col-sm-3" type="text" name="id" id="id" value= {{ $dep->id}}> </div>
						</div>

						<div class="form-group row form-group-lg" style="font-size: 16pt;">
							<div class="col-sm-3"><label class="control-label" for="name">Name</label></div>
							<div class="col-sm-6"><input class="form-control col-sm-3" type="text" name="name" id="name" value= " {{ $dep->name}} "> </div>
						</div>

						<br>
						<div class="form-group row form-group-lg">
							<button class="btn btn-primary col-sm-2" type="submit" name="edit">Edit</button>
							<button type="submit" name="cancel" class="btn btn-danger col-sm-offset-4 col-sm-2">Cancel</button>
						</div>
					</form>

				</div>

			</div>
	</div>
@endsection

