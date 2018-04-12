<div class="header">
    <div class="logo-menu">
        <nav class="navbar navbar-default main-navigation" role="navigation" data-spy="affix" data-offset-top="50">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand logo" href="{{ url('/') }}">Bido</a>


                </div>
                <div class="collapse navbar-collapse" id="navbar">

                    <ul class="nav navbar-nav">
                        @if(Auth::guest())
                            <li>
                                <a class="" href="{{ url('/') }}">Home </i></a>
                            </li>
                            <li>
                                <a href="{{ url('/about') }}">Post Job </i></a>

                            </li>

                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::guest())
                            <li class="left"><a href="{{ url('/register') }}"><i class="ti-user"></i> Register</a></li>
                            <li class="right"><a href="{{ url('/signin') }}"><i class="ti-lock"></i> Log In</a></li>
                        @else
                            <li class="left">
                                <a href="{{ url('') }}"><i class="ti-angle-down"></i> {{ Auth::user()->name }}</a>
                                <ul class="dropdown">
                                    <li>
                                        <?php
                                         $user = Auth::user();
                                         $name = str_replace(' ', '-', strtolower($user->name));
                                             ?>
                                        <a href="{{ url('user/'.$name) }}">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('editProfile') }}">Edit Profile</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="right">
                                <a href="{{ url('/login') }}"> <i class="ti-angle-down"></i> <i class="ti-settings"></i></a>
                                <ul class="dropdown">
                                    <a href="{{ url('/logout') }}">Logout</a>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <ul class="wpb-mobile-menu">
                @if(Auth::check())
                    <li>
                        <a class="active" href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/about') }}">About Us</a>
                    </li>
                   
                    <li>
                        <a href="{{ url('/register') }}"><i class="ti-user"></i> Sign up</a>
                    </li>
                    <li>
                        <a href="{{ url('/sigin') }}"><i class="ti-lock"></i> Login</a>
                    </li>
                @endif
            </ul>

        </nav>
    </div>
</div>

<div class="col-md-6 col-md-offset-3">
    @include('flash::message')
</div>