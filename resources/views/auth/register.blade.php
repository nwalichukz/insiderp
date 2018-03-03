@extends('layouts.app')
@section('title')
Login | Sign up
@endsection

@section('content')
	@include('partials.header2')

	<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Register</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="{{ url('/') }}">Home</a></li>
					<li>Register</li>
				</ul>
			</nav>
		</div>

	</div>
</div>

<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

	<div class="my-account">

		<div class="tabs-container">

			<!-- Register -->
			<div class="tab-content" id="tab2" style="display: none;">

				<form method="post" class="register" action="{{ url('account/register') }}">
					{{ csrf_field() }}
				<p class="form-row form-row-wide">
					<label for="username2">Full Name:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="name" placeholder="Full Name" id="name" value="" />
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Email Address:
						<i class="ln ln-icon-Mail"></i>
						<input type="text" class="input-text" name="email" placeholder="Email Address" id="email2" value="" />
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password1">Password:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password" placeholder="Password" id="password1"/>
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password1">Phone:
						<i class="ln ln-icon-Phone-2"></i>
						<input class="input-text" type="text" name="Phone_no" placeholder="Phone Number" id="phone"/>
					</label>
				</p>

				<p class="form-row">
					<label for="Gender">Gender:
						<input type="radio" name="gender" value="male"> Male
						<input type="radio" name="gender" value="female"> Female
						<input type="radio" name="gender" value="other"> Other
					</label>
				</p>

				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
				</p>

				</form>
			</div>
		</div>
	</div>
</div>

@include('partials.footer')
