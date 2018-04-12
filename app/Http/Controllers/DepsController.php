<?php

namespace App\Http\Controllers;

use App\Worker;
use App\Departament;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class DepsController extends Controller
{
   

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin');
    }

    public function index()
    {
        $deps = Departament::all();
        return view('deps.index' , compact('deps'));
    }

    public function create()
    {
    	return view('deps.create');
    }

    public function store()
    {
        $this->validate(request() , ['name' => 'required']);
        
    	Departament::create([
    			'name' => request('name')
    		]);

        session()->flash('message' , 'Departament was added succesfully ');

    	return redirect('/add/dep');
    }	

    public function show(Departament $dep)
    {
        return view('deps.show' , compact('dep'));
    }

    public function update(Departament $dep)
    {
        if(request()->has('cancel'))
            return redirect('/deps');

        if($dep->id == request('id') || !Departament::where('id' , '=' , request('id') )->exists() )
        {
            $dep->update([
                    'id' => request('id') , 
                    'name' => request('name')
                ]);
            return redirect('/deps');
        }
        else
        {
            session()->flash('message' , 'The given ID already exists');
            return view('deps.show' , compact('dep'));
        }

    }

    public function fetch_workers()
    {

        $workers =  DB::table('workers')
                    ->where('workers.dep_id' , '=' ,request('id'))
                    ->join('departaments' , 'workers.dep_id' , '=' , 'departaments.id')
                    ->join('positions' , 'workers.pos_id' , '=' , 'positions.id')
                    ->select('workers.id' , 'workers.name as worker_name' , 'positions.name as pos_name' , 'departaments.name as dep_name' , 'workers.created_at')
                    ->get();
        $ajaxResponse = Datatables::of($workers)->make(true);
        return $ajaxResponse;
    }
}
