<?php

namespace App\Http\Controllers;

use App\Worker;
use App\Position;
use App\Departament;
use Illuminate\Http\Request;
use App\Http\Requests\WorkRequest;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WorkersController extends Controller
{
 

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin');
    }


    public function index()
    {
        return view('workers.index');
    }

    public function create()
    {
        $positions = Position::all();
    	return view('workers.create' , compact('positions'));
    }

    public function store(WorkRequest $workerRequest)
    {
        $dep = Departament::where('name' , request('dep'))->first();
        $pos= Position::where('name' , request('position'))->first();

    	Worker::create([

    			'name' => request('name') ,
                'dep_id' => $dep->id ,
                'pos_id' => $pos->id
    		]);

        session()->flash('message' , 'Worker was added succesfully');

    	return redirect('/add/worker');
    }

    public function fetch()
    {
        $workers =  DB::table('workers')
                    ->join('departaments' , 'workers.dep_id' , '=' , 'departaments.id')
                    ->join('positions' , 'workers.pos_id' , '=' , 'positions.id')
                    ->select('workers.id' , 'workers.name as worker_name' , 'positions.name as pos_name' , 'departaments.name as dep_name' , 'workers.created_at')
                    ->get(); 

        $ajaxResponse = Datatables::of($workers)->toJson();
        return $ajaxResponse;
    }

    public function update(Worker $worker , WorkRequest $workerRequest)
    {
        if(request()->has('cancel'))
           return redirect('/workers');
           
        if( request('id') == $worker->id || !Worker::where('id' , '=' , request('id') )->exists() )
        {  
            $id = Departament::where('name' , request('dep'))->pluck('id');
            $pos= Position::where('name' , request('position'))->first();

            $worker->update([
                    'id' => request('id') , 
                    'name' => request('name') , 
                    'dep_id' => $id[0] , 
                    'pos_id' => $pos->id
                ]);
             return view('workers.index'); 
        }
        else
        {
            session()->flash('message' , 'The given ID already exists');
            return redirect('/workers/' . $worker->id);
        }
    }

    public function show(Worker $worker)
    {
        $deps = DB::table('departaments')
                    ->select('name')
                    ->whereNotIn('id' , explode(", ", $worker->dep_id))
                    ->get();

        $positions = DB::table('positions')
                    ->select('name')
                    ->whereNotIn('id' , explode(", ", $worker->pos_id))
                    ->get();

         return view('workers.change' , compact(['worker' ,'positions' , 'deps']));
    }

    public function destroy(Worker $worker)
    {
        $id = $worker->id;
        $worker->delete();

        session()->flash('message' , 'Worker with id ' . $id . ' was succesfully deleted');

        return redirect('/workers');
    }
}
