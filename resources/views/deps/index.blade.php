@extends('layouts.master')


@section('content')
    <div class="container">
    	@if($flash = session('message'))
            <div class="alert alert-warning" id="flash">
                {{$flash}}
            </div>
        @endif

        <h1>Departaments</h1>
        <br><br>
        <div class="row">
	         <div class="list-group col-sm-5" >
	        	@foreach($deps as $dep)
	        		<li class="list-group-item"><a href="/deps/{{$dep->id}}">{{$dep->name}}</a>
	        			<button class="btn btn-success badge" id="{{$dep->id}}">View Workers</button>
	        		</li>
	        	@endforeach
	        </div>

	        <div class="col-sm-offset-1 col-sm-6" id="divTable">
	        	
	        </div>
        </div>

     </div>

     <script type="text/javascript"> 
     
        $(document).ready(function(){

              $('button').click(function(){
                $('#divTable').empty();
                var mytable = '<table id="dataTable"><thead><tr>' + 
                                '<th>Id</th>' +
                                '<th>Name</th>' +
                                '<th>Position</th>' +
                                '<th>Departament</th>' +
                                '<th>Start_Date</th>' +
                            '</tr></thead></table>';
                $('#divTable').append(mytable);
                var dep_id =  $(this).attr('id');

                var table = $('#dataTable').DataTable( {

                      "processing": true,
                      "serverSide": true,
                      "ajax": {
                            "url" : '{!! route('workerDepData') !!}'  , 
                            "type" : 'POST' ,
                            "data" : {
                                        "_token": "{{ csrf_token() }}" ,
                                         id: dep_id  } 
                        },
                       columns: [
                              { data: 'id', name: 'id' },
                              { data: 'worker_name' , name:'name' },
                              { data: 'pos_name', name: 'pos_name' },                     
                              { data: 'dep_name' , name:'dep_name'} ,
                              { data: 'created_at', name: 'created_at' } 
                          ] 
                  } );

              } );
         
            });
     </script>
  
@endsection