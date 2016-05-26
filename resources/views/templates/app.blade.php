<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Sakila</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> 

    <!-- Styles -->
    {{-- <link href="css/all.css" rel="stylesheet">    --}}

    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">


    
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Sakila</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">

            <li><a href="/rentals">     <span class="glyphicon glyphicon-film"></span> Rentals</a></li>

            <li><a href="/films">       <span class="glyphicon glyphicon-film"></span> Films</a></li>
            <li><a href="/customers">   <span class="glyphicon glyphicon-user"></span> Customers</a></li>
            <li><a href="/staffs">      <span class="glyphicon glyphicon-user"></span> Staff</a></li>
            <li><a href="/about">       <span class="glyphicon glyphicon-info-sign"></span> About</a></li>
            <li><a href="/contact">     <span class="glyphicon glyphicon-envelope"></span> Contact</a></li>

            {{-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Database<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/actors">Actors</a></li>
                    <li><a href="/addresses">Addresses</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>                
                </ul>
            </li> --}}

            
          </ul>
          <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">     <span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    {{-- <li><a href="{{ url('/register') }}">  <span class="glyphicon glyphicon-list-alt"></span> Register</a></li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} : {{ Auth::user()->getStoreName() }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    <div class="container">

        @yield('content')

    </div>

    

    <!-- JavaScripts -->
    <script src="{{ url('js/all.js') }}"></script>
    
     @yield('footer')
    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
