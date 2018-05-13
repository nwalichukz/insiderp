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

                    <a class="navbar-brand logo" href="{{ url('/') }}"><img src='{{asset("images/watermark/logo.png")}}' alt="Bido"></a>


                </div>
                <div class="collapse navbar-collapse" id="navbar">

                    <ul class="nav navbar-nav">
                        @if(Auth::guest())
                            <li>
                                <a class="" href="{{ url('/') }}">Home </a>
                            </li>
                            <li>
                                <a href="{{ url('/about') }}">About</a>
                            </li>
                            <li>
                                <a href="{{ url('/contact') }}">Contact us </a>
                            </li>
                            <li>
                                <a href="{{ url('/faqs') }}">FAQs</a>
                            </li>
                        @endif
                        @if (Auth::check())
                                <li>
                                    <a href="{{ url('/post-job') }}">Post Job </a>
                                </li>
                                <li>
                                    <a href="{{ url('messages') }}">Messages</a>
                                </li>
                                <li>
                                    <a href="{{ url('my-jobs') }}">
                                        My Jobs <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown">
                                        <li>
                                            <a class="active" href="{{ url('my-jobs') }}">
                                                Job Offers
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('jobs-ongoing') }}">
                                                Ongoing Jobs
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('jobs-completed') }}">
                                                Jobs Completed
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('manage-applications') }}">
                                                 My posted jobs
                                            </a>
                                        </li>
                                            <li>
                                        <a title="The jobs I applied for" href="{{ url('my-applications') }}">
                                            My Applications for jobs
                                        </a>
                                    </li>
                                    </ul>
                                </li>
                                @if(Auth::user()->service)
                                    <li>
                                        <a href="{{ url('browse_jobs') }}">Browse Jobs</a>
                                    </li>
                                @endif
                                @if(!Auth::user()->service)
                                    <li>
                                        <a href="{{ url('service') }}">Add Service</a>
                                    </li>
                                @endif
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::guest())
                            <li class="left"><a href="{{ url('/register') }}"><i class="ti-user"></i> Register</a></li>
                            <li class="right"><a href="{{ url('/signin') }}"><i class="ti-lock"></i> Log In</a></li>
                        @else
                            <li class="left">
                                <a href="{{ url('user/'.str_replace(' ', '-', strtolower(Auth::user()->name))) }}">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="{{ url('user/'.str_replace(' ', '-', strtolower(Auth::user()->name))) }}">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('editProfile') }}">Edit Profile</a>
                                    </li>
                                <!--
                                    <li>
                                        <a href="{{-- url('manage-applications') --}}">Manage Applications</a>
                                    </li>
                                 -->
                                    <li>
                                        <a href="{{ url('logout') }}">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <ul class="wpb-mobile-menu">
                @if(Auth::guest())
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
                @else
                    <li>
                        <a href="{{ url('messages') }}">Messages</a>
                    </li>
                    <li>
                        <a href="{{ url('my-jobs') }}"><i class="fa fa-angle-down"></i> My Jobs</a>
                        <ul class="dropdown">
                            <li>
                                <a title="The jobs I offered" class="active" href="{{ url('my-jobs') }}">
                                    Job Offers
                                </a>
                            </li>
                            <li>
                                <a title="My jobs ongoing" href="{{ url('jobs-ongoing') }}">
                                    Ongoing Jobs
                                </a>
                            </li>
                            <li>
                                <a title="The jobs I have completed" href="{{ url('jobs-completed') }}">
                                    Jobs Completed
                                </a>
                            </li>
                            <li>
                                <a title="The jobs I posted" href="{{ url('manage-applications') }}">
                                    My posted jobs
                                </a>
                            </li>
                                <li>
                                        <a title="The jobs I applied for" href="{{ url('my-applications') }}">
                                            My Applications for jobs
                                        </a>
                                    </li>
                        </ul>
                    </li>
                    @if(Auth::user()->service)
                        <li>
                            <a title="View posted jobs" href="{{ url('browse_jobs') }}">Browse Jobs</a>
                        </li>
                    @endif
                    @if(!Auth::user()->service)
                        <li>
                            <a href="{{ url('service') }}">Add Service</a>
                        </li>
                    @endif
                    <li class="left">
                        <a href="{{ url('') }}"><i class="ti-angle-down"></i> {{ Auth::user()->name }}</a>
                        <ul class="dropdown">
                            <li>
                                <a title="Go to your dashboard home page" href="{{ url('user/'.str_replace(' ', '-', strtolower(Auth::user()->name))) }}">Dashboard</a>
                            </li>
                            <li>
                                <a title="edit your profile" href="{{ route('editProfile') }}">Edit Profile</a>
                            </li>
                        <!--
                                    <li>
                                        <a href="{{-- url('manage-applications') --}}">Manage Applications</a>
                                    </li>
                                 -->
                            <li>
                                <a title="click to logout" href="{{ url('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>

        </nav>
    </div>
</div>

<div class="col-md-6 col-md-offset-3">
    @include('flash::message')
</div>