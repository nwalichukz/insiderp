
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
					<a class="navbar-brand logo" href="{{ url('/') }}"><img src="assets/img/logo99.png" alt="Bido"></a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">

					<ul class="nav navbar-nav">
						<li>
							<a class="active" href="{{ url('/') }}">Home </i></a>	
						</li>
						<li>
							<a href="{{ url('/about') }}">About Us </i></a>
						</li>
						<li>
							<a href="{{ url('/contact') }}">Contact Us </a>
						</li>
						<li>
							<a href="{{ url('/faqs') }}">FAQs </a>
						</li>
						<li>
							<a href="{{ url('/blog') }}">Blog</i></a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right float-right">
						<li class="left"><a href="{{ url('/register') }}"><i class="ti-user"></i> Register</a></li>
						<li class="right"><a href="{{ url('/signin') }}"><i class="ti-lock"></i> Login</a></li>
					</ul>
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
					<a href="{{ url('/signin') }}"><i class="ti-lock"></i> Login</a>
				</li>
			</ul>

		</nav>

		</div>

		@include('partials.banner')
	</section>
</div>