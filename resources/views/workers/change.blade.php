@extends('layouts.master')

@section('content')
	<div class="container">
	
		@include('layouts.alert')

		<b><h1 style="text-align: center;">Worker {{$worker->name}}</h1></b>
		<br><br><br>
		<div class="row">
			
			<div class="col-sm-offset-4 col-sm-6">

				<form method="POST" action="/workers/{{$worker->id}}">

					{{csrf_field()}}
					
					<div class="form-group row form-group-lg" style="font-size: 16pt;">
						<div class="col-sm-3"><label class="control-label" for="name">Id</label></div>
						<div class="col-sm-6"><input class="form-control col-sm-3" type="text" name="id" id="id" value= {{ $worker->id}}> </div>
					</div>

					<div class="form-group row form-group-lg" style="font-size: 16pt;">
						<div class="col-sm-3"><label class="control-label" for="name">Name</label></div>
						<div class="col-sm-6"><input class="form-control col-sm-3" type="text" name="name" id="name" value= " {{ $worker->name}} "> </div>
					</div>

					<div class="form-group row form-group-lg" style="font-size: 16pt;">
						<div class="col-sm-3"><label class="control-label" for="position">Position</label></div>
						<div class="col-sm-6">
							<select class="form-control" id="position" name="position">
								<option>{{$worker->position->name}}</option>
								@foreach($positions as $position)
										<option> {{$position->name}} </option>
								@endforeach
							</select>
					    </div>
					</div>

					<div class="form-group row form-group-lg" style="font-size: 16pt;">
						<div class="col-sm-3"><label class="control-label" for="dep">Departament</label></div>
						<div class="col-sm-6">
							<select class="form-control" id="dep" name="dep">
								<option>{{$worker->departament->name}}</option>
								@foreach($deps as $dep)
										<option> {{$dep->name}} </option>
								@endforeach
							</select>
					    </div>
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