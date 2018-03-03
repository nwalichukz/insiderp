
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

				<li><a href="{{ url('/') }}" id="current">Home</a></li>

				<li><a href="{{ url('about') }}">About Us</a></li>

				<li><a href="{{ url('contact') }}">Contact Us</a></li>

				<li><a href="{{ url('faqs') }}">FAQs</a></li>

				<li><a href="blog.html">Blog</a></li>
			</ul>


			<ul class="float-right">
				<li><a href="my-account.html#tab2"><i class="fa fa-user"></i> Sign Up</a></li>
				<li><a href="my-account.html"><i class="fa fa-lock"></i> Log In</a></li>
			</ul>

		</nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>