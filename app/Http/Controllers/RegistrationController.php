<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    //
    public function create()
    {
    	return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
        $uniqueId = uniqid('img_' . rand(10000,99999), true);
        $name = $uniqueId . '.' . request('file')->extension();

         request('file')->storeAs('public/images' , $name );

         $path = '/storage/images/' . $name;

    	$user = User::create([
    			'name' => request('name') ,
    			'surname' => request('surname') ,
    			'email' => request('email') ,
    			'address' => request('address') , 
    			'password' => Hash::make(request('password')) ,
                'role_id' => 1 , 
                'path' => $path
    		]);

    	auth()->login($user);

    	return redirect()->home();
    }

}
