@extends('layouts.app')
@section('title')
Contact us | Biddo
@endsection

@section('content')
<style>
      #google-map,
      body,
      html {
        padding: 0;
        height: 460px;
      }
    </style>
<div class="header">
	<div class="header-banner">
		<nav class="navbar navbar-default main-navigation" role="navigation" data-spy="affix" data-offset-top="50">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand logo" href="index-2.html"><img src="assets/img/logoh.png" alt="Biddo"></a>
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
						<li class="right"><a href="{{ url('/login') }}"><i class="ti-lock"></i> Log In</a></li>
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
					<a href="{{ url('/about') }}"><i class="ti-lock"></i> Login</a>
				</li>
			</ul>
			</nav>
			</div>
		</div>

	<div id="google-map"></div>


<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2 class="medium-title">
					Contact Us
				</h2>
				<div class="information">
					<div class="contact-datails">
						<div class="icon">
							<i class="ti-location-pin"></i>
						</div>
						<div class="info">
							<h3>Address</h3>
							<span class="detail">Main Office: NO.22-23 Street Name- City,Country</span>
							<span class="datail">Customer Center: NO.130-45 Streen Name- City, Country</span>
						</div>
					</div>
					<div class="contact-datails">
						<div class="icon">
							<i class="ti-mobile"></i>
						</div>
						<div class="info">
							<h3>Phone Numbers</h3>
							<span class="detail">Main Office: +880 123 456 789</span>
							<span class="datail">Customer Supprort: +880 123 456 789 </span>
						</div>
					</div>
					<div class="contact-datails">
						<div class="icon">
							<i class="ti-location-arrow"></i>
						</div>
						<div class="info">
							<h3>Email Address</h3>
							<span class="detail">Customer
							Support: <a href="../../../external.html?link=http://demo.graygrids.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fb92959d94bb969a9297d5989496">[email&#160;protected]</a></span>
							<span class="detail">Technical Support: <a href="../../../external.html?link=http://demo.graygrids.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d2a1a7a2a2bda0a692bfb3bbbefcb1bdbf">[email&#160;protected]</a></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<form id="contactForm" class="contact-form" data-toggle="validator">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required data-error="Please enter your name">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								 <div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="email" placeholder="mail@sitename.com" required data-error="Please enter your email">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" placeholder="Subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
									<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" id="message" placeholder="Massage" rows="11" data-error="Write your message" required></textarea>
										<div class="help-block with-errors"></div>
										</div>
								</div>
								<div class="col-md-12">
									<button type="submit" id="submit" class="btn btn-common">Send Us</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection