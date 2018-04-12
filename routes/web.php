<?php
use Illuminate\Support\Facades\App;
//For the chat system. Needs to be tested and fixed, it has not been working. 
Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
                      'test-event', 
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});


Route::get('/', function () {
    return view('layouts.index');
})->name('home');

Route::get('/chat' , 'ChatController@index');
Route::post('/chat' , 'ChatController@postMessage');

Route::get('/profile' , 'ProfileController@index');
Route::get('/edit' , 'ProfileController@change');
Route::post('/edit' , 'ProfileController@update');

Route::get('/workers' , 'WorkersController@index'); 
Route::get('/workers/fetch' , 'WorkersController@fetch')->name('workerData');
Route::get('/add/worker' , 'WorkersController@create');
Route::post('/add/worker' , 'WorkersController@store');
Route::get('/workers/{worker}' , 'WorkersController@show');
Route::post('/workers/{worker}' , 'WorkersController@update');
Route::get('/workers/delete/{worker}' , 'WorkersController@destroy');

Route::get('/add/workerPosition' , 'PositionsController@create');
Route::post('/add/workerPosition' , 'PositionsController@store');

Route::get('/deps' , 'DepsController@index'); 
Route::post('/deps' , 'DepsController@fetch_workers')->name('workerDepData');
Route::get('/add/dep' , 'DepsController@create');
Route::post('/add/dep' , 'DepsController@store');
Route::get('/deps/{dep}' , 'DepsController@show');
Route::post('/deps/{dep}' , 'DepsController@update');

Route::get('/register' , 'RegistrationController@create');
Route::post('/register' , 'RegistrationController@store');

Route::get('/login' , 'SessionController@create')->name('login');
Route::post('/login' , 'SessionController@store');
Route::get('/logout' , 'SessionController@destroy');
