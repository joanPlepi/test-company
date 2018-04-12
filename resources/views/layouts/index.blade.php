@extends('layouts.master')


@section('content')
	<div class="jumbotron">
      <div class="container">
      <?php $word = 'world';
            if(Auth::check())
              $word = auth()->user()->name; ?>
 
        <h1 class="display-3">Hello, {{ $word }} from Test Company!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

      <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>Worker</h2>
          <p>This text has no specific meaning. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-secondary" href="/workers" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-6">
          <h2>Departments</h2>
          <p> This text has no specific meaning. Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-secondary" href="/deps" role="button">View details &raquo;</a></p>
        </div>
      </div>
@endsection