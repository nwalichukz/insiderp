
<!-- Header
================================================== -->
<header class="transparent sticky-header">
<div class="container">
	<div class="sixteen columns">
	
		<!-- Logo -->
		<div id="logo">
			<h1><a href="{{ url('/') }}"><img src="images/logo2k.png" alt="Biddo" /></a></h1>
		</div>

		<!-- Menu -->
		<nav id="navigation" class="menu">
			<ul id="responsive">

				@if (Auth::guest())
					<li><a href="{{ url('/') }}" id="current">Home</a></li>

					<li><a href="{{ url('about') }}">About Us</a></li>

					<li><a href="{{ url('contact') }}">Contact Us</a></li>

					<li><a href="{{ url('faqs') }}">FAQs</a></li>

				@else
					<li><a href="{{ url('profile') }}">Profile</a></li>
					<li><a href="{{ url('offers') }}">Offers</a></li>
					<li><a href="{{ url('notifications') }}">Notifications</a></li>
					<li><a href="{{ url('messages') }}">Messages</a></li>
				@endif

				<li><a href="blog.html">Blog</a></li>
			</ul>


			<ul class="float-right">
				@if(Auth::guest())
					<li><a href="{{ url('register') }}"><i class="fa fa-user"></i> Sign Up</a></li>
					<li><a href="{{ url('login') }}"><i class="fa fa-lock"></i> Log In</a></li>

				@else
					<li><a href="{{ url('logout') }}"><i class="fa fa-user"></i>Logout</a></li>
					
				@endif
			</ul>

		</nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>