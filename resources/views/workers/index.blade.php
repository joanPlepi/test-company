@extends('layouts.master')

@section('content')
    <div class="container">
    	@if($flash = session('message'))
            <div class="alert alert-warning" id="flash">
                {{$flash}}
            </div>
        @endif

        <b><h1 style="text-align: center;">Employees of Company</h1></b>
        <br><br>
    	<table id="dataTable" class="table-bordered table-hover" width="70%" cellspacing="0" style="margin:1em auto;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Departament</th>
                    <th>Start_Date</th>
                    <th>View Details</th>
                </tr>
            </thead>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
           var table = $('#dataTable').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": '{!! route('workerData') !!}' ,
                 columns: [
                        { data: 'id', name: 'id' },
                        { data: 'worker_name' , name:'name' },
                        { data: 'pos_name', name: 'pos_id' },                     
                        { data: 'dep_name' , name:'dep_id'} ,
                        { data: 'created_at', name: 'created_at' } ,
                        {
                                "className":      "details",
                                "orderable":      false,
                                "data":           null,
                                "defaultContent": '<button class="btn btn-success" id="show">Show</button>'           }
                    ] 
            } );

              $('#dataTable tbody').on('click' , 'button' , function(){

                    if($(this).attr('id') != "show")
                        return;
                    var tr = $(this).closest('tr');
                    var row = table.row( tr );

                    if ( row.child.isShown() ) {
                        // This row is already open - close it
                        $(this).removeClass('btn-danger');
                         $(this).addClass('btn-success');
                         $(this).text('Show');
                        row.child.hide();
                        tr.removeClass('shown');
                    }
                    else {
                        // Open this row
                         $(this).removeClass('btn-success');
                         $(this).addClass('btn-danger');
                         $(this).text('Hide');
                        row.child( format(row.data()) ).show();
                        tr.addClass('shown');
                    }
                 });

              $('#flash').fadeOut(5000);

        } );

      function format ( d ) {
                    // `d` is the original data object for the row
                    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                        '<tr>'+
                            '<td>ID: </td>'+
                            '<td>'+d.id+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td>Name: </td>'+
                            '<td>' + d.worker_name +'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td>Position: </td>'+
                            '<td>' + d.pos_name +'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td>Departament: </td>'+
                            '<td>' + d.dep_name +'</td>'+
                        '</tr>'+
                    '</table>' + 
                    '<br><div class="row">' + 
                        '<div class="col-sm-offset-1 col-sm-2">' +
                        '<a href="/workers/' + d.id +
                        '"><button class="btn btn-primary"> Edit </button></a>' +
                        '</div>' +
                        '<div class="col-sm-2">' +
                        '<a href="/workers/delete/' + 
                        d.id +'"><button class="btn btn-danger"> Delete</button></a> ' +
                        '</div>' +
                    '</div>';
            }


    </script> 

    @endsection
