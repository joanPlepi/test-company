<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Test App Company</a>
    </div>
    <ul class="nav navbar-nav">

      <li><a href="/">Home</a></li>
      @if(Auth::check())
         <li><a href="/profile">Profile</a></li>
      @endif

      {{-- Navigation bar of admin will be different from the user --}}
      @if(Auth::check() && auth()->user()->role->name == 'admin')
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Add<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/add/worker">Add worker</a></li>
                <li><a href="/add/dep">Add dep</a></li>
                <li><a href="/add/workerPosition">Add worker position</a></li>
              </ul>
        </li>  
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/workers">View worker</a></li>
                <li><a href="/deps">View dep</a></li>
              </ul>
        </li>  
      @else
        
        <li><a href="#">Nothing here</a></li>
      @endif

     </ul>

    <ul class="nav navbar-nav navbar-right">

      @if(Auth::check())
        <li><a href="/profile"><span class="glyphicon glyphicon-user"></span> {{ auth()->user()->name }}</a></li>
        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      @else
        <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      @endif

    </ul>
  </div>
</nav>
