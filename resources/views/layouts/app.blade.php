<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(!empty($title))
	    {{ $title }}
		@else
		Luba.com.ng
		@endif</title>

    <!-- Styles -->
   <script src="{{ URL('js/jquery.js') }}" type="text/Javascript"> </script>
    <script src="{{ URL('bootstrap/js/bootstrap.min.js') }}" type="text/Javascript"> </script>
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <!--<link href="/css/app.css" rel="stylesheet">-->
     <link href="{{asset('css/orientStyle.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav id="header" class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                   <!-- <img class="logoImg" src="{{asset('images/logo/orientLogo.jpg')}}" />-->
                    <p class="logoText">Luba</p>
                </a>
               
            </div>
             
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                       <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->
<div class="col-md-12">
<hr/>
<nav class="footer"><a href="{{url('/')}}">Home</a> |<a href=""> Terms </a>|<a href=""> Privacy</a> | <a href="{{url('/contact')}}">Contact us</a></nav>
 <nav class="footer"><a title="Go to letnote website" href="https://www.letnote.com.ng">Developed by Letnote </a></nav>
   </div>
</body>
</html>
