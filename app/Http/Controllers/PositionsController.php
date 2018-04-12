<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;

class PositionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin');
    }

    public function create()
    {
    	return view('positions.create');
    }

    public function store()
    {
    	$this->validate(request() , ['name' => 'required']);

    	Position::create([
    			'name' => request('name')
    		]);

        session()->flash('message' , 'Position was added succesfully ');

    	return redirect('/add/workerPosition');
    }
}
