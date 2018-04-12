@extends('layouts.master')

@section('content')
	<div class="container">

		<b><h1 style="text-align: center;"> Bej ndryshime </h1></b>
		<br><br><br>
		<div class="row">
			
			<div class="col-sm-offset-4 col-sm-6">

				<form method="POST" action="/edit" enctype="multipart/form-data">

					{{csrf_field()}}
					
					<div class="form-group row form-group-lg" style="font-size: 16pt;">
						<div class="col-sm-3"><label class="control-label" for="name">Name</label></div>
						<div class="col-sm-6"><input class="form-control col-sm-3" type="text" name="name" id="name" value= {{ auth()->user()->name}}> </div>
					</div>

					<div class="form-group row form-group-lg" style="font-size: 16pt;">
						<div class="col-sm-3"><label class="control-label" for="name">Surname</label></div>
						<div class="col-sm-6"><input class="form-control col-sm-3" type="text" name="surname" id="surname" value= {{ auth()->user()->surname}}> </div>
					</div>

					<div class="form-group row form-group-lg" style="font-size: 16pt;">
						<div class="col-sm-3"><label class="control-label" for="name">Address</label></div>
						<div class="col-sm-6"><input class="form-control col-sm-3" type="text" name="address" id="address" value= "{{ auth()->user()->address }}"> </div>
					</div>

					<div class="form-group row form-group-lg" style="font-size: 16pt;">
						<div class="col-sm-3"><label class="control-label" for="name">Email</label></div>
						<div class="col-sm-6"><input class="form-control col-sm-3" type="email" name="email" id="email" value= {{ auth()->user()->email}}> </div>
					</div>

					<br>
					<div class="form-group row form-group-lg">
							<label class="control-label col-sm-2" for="file"> Upload image </label>
							<div class="col-sm-6">
								<input type="file" name="file" id="file">
							</div>
							<span class="col-sm-offset-4"></span>
					</div>
					<br><br>
					<div class="form-group row form-group-lg">
						<button class="btn btn-primary btn-lg" type="submit" name="edit">Edit</button>
						<button class="btn btn-danger btn-lg" type="submit" name="cancel">Cancel</button>
					</div>

					@include('layouts.errors');
				</form>

			</div>

		</div>

	</div>
@endsection