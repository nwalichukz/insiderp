
<!-- Header
================================================== -->
<div class="header">
	<section id="intro" class="section-intro">
		<div class="logo-menu">
		<nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="50">
			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand logo" href="{{ url('/') }}"><img src="assets/img/logo99.png" alt="Biddo"></a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">

					<ul class="nav navbar-nav">
						@if(Auth::guest())
                            <li>
                                <a class="active" href="{{ url('/') }}">Home </i></a>
                            </li>
                            <li>
                                <a href="{{ url('/about') }}">About Us </i></a></li>
                            <li>
                                <a href="{{ url('/contact') }}">Contact Us </a>
                            </li>
                            <li>
                                <a href="{{ url('/faqs') }}">FAQs </a>
                            </li>
                            <li>
                                <a href="{{ url('/blog') }}">Blog</a>
                            </li>

                        @endif
					</ul>
					<ul class="nav navbar-nav navbar-right float-right">
						@if(Auth::guest())
                            <li class="left"><a href="{{ url('/register') }}"><i class="ti-user"></i> Register</a></li>
                            <li class="right"><a href="{{ url('/login') }}"><i class="ti-lock"></i> Log In</a></li>
                        @endif
					</ul>
                    @if(Auth::check())
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-down"></i> {{ Auth::user()->name }}
                                    <ul class="dropdown">
                                        <li>
                                            <a href=""> Profile <i class="fa fa-user-circle"></i></a>
                                        </li>
                                        <li>
                                            <a href=""> Settings <i class="fa fa-gear"></i></a>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('logout') }}">
                                    <i class="fa fa-user-times"></i> Logout
                                </a>
                            </li>
                        </ul>
                    @endif
				</div>
			</div>

			<ul class="wpb-mobile-menu">
				<li>
					<a class="active" href="{{ url('/') }}">Home</a>
				</li>
				<li>
					<a href="{{ url('/about') }}">About Us</a>
				</li>
				<li>
					<a href="{{ url('/contact') }}">Contact Us</a>
				</li>
				<li>
					<a href="{{ url('/faqs') }}">FAQs</a>
				</li>
				<li>
					<a href="{{ url('/blog') }}">Blog</a>
				</li>
				<li>
					<a href="{{ url('/register') }}"><i class="ti-user"></i> Sign up</a>
				</li>
				<li>
					<a href="{{ url('/about') }}"><i class="ti-lock"></i> Login</a>
				</li>
			</ul>

		</nav>

		</div>

	</section>

</div>