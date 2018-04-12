<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
	protected $pusher;
	protected $user;
	protected $chatChannel;

	const DEFAULT_CHAT_CHANNEL = 'chat';

	public function __construct()
	{
		$this->middleware('auth');
		/* In Laravel 5.3, you can't access the session or authenticated user in your controller's constructor because the middleware has not run yet. middleware aktivizohet mbasi ke therritur nje metode te clases dhe pa midd auth nuk e kap dot Auth::user()*/
		$this->middleware( function($request , $next){

			$this->user = Auth::user();

			return $next($request);
		});

		$this->pusher = App::make('pusher');
		$this->chatChannel = self::DEFAULT_CHAT_CHANNEL;

	}

	public function index()
	{
		return view('chat' , ['chatChannel' => $this->chatChannel]);
	}

	public function postMessage(Request $request)
	{
		$data = [ 

				'message' => e( $request->input('chat_text')) , 
				'name' => $this->user->name , 
				'avatar' => $this->user->getImage() , 
				'timestamp' => (time()*1000)
		]; 

		$this->pusher->trigger($this->chatChannel, 'new-message', $data);
	}	

}
