<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('auth');
		
	}

	public function index()
	{
		$id = auth()->user()->id;
		$path = User::where('id' , '=' , $id)->pluck('path')->last();
		
		return view('profiles.index' , compact('path'));
	}

	public function change()
	{
		return view('profiles.change');
	}

	public function update()
	{
		if(request()->has('cancel'))
			return redirect('/profile');
		//Validation of the form.
		$this->validate(request() , [
								'name' => 'required' , 
								'surname' => 'required' , 
								'address' => 'required' , 
								'email' => 'required'
			]);

		/*
			If there is a file in the form, I take the path in db and I delete the old one. 
			After it the new one is saved in db
		*/  
		if(request('file') != null) 
		{			
			auth()->user()->updateFilePath(request('file'));
		}

		//Here we update the other details. 
		auth()->user()->update([
				'name' => request('name') ,
				'surname' => request('surname') , 
				'address' => request('address') ,
				'email' => request('email') , 
			]);

		//get back at the profile of the user. 
		 return redirect('/profile');
	}
    
}
