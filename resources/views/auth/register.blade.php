@extends('layouts.app')
@section('title')
Login | Sign up
@endsection

@section('content')
	@include('partials.header2')

<!-- Content
================================================== -->
<div id="content" class="my-account">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
				<div class="my-account-form">
					<h1><a href="#">Register Here!</a></h1>
					<hr>

					<div id="cd-signup">
						<div class="page-login-form register">
							<form role="form" method="POST" class="login-form" action="{{ route('signup') }}">
								{{csrf_field()}}
								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									<div class="input-icon">
										<i class="ti-user"></i>
										<input type="text" id="name" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}">
										@if ($errors->has('name'))
											<span class="help-block">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<div class="input-icon">
										<i class="ti-email"></i>
										<input type="text" id="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}">
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>
                          
								<div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
									<div class="input-icon">
										<i class="ti-mobile"></i>
										<input type="text" id="phone_no" class="form-control" name="phone_no" placeholder="Phone Number" value="{{ old('phone_no') }}">
										@if ($errors->has('phone_no'))
											<span class="help-block">
												<strong>{{ $errors->first('phone_no') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
									<div class="input-icon">
										<i class="ti-world"></i>
										<input type="text" id="state" class="form-control" name="state" placeholder="State" value="{{ old('state') }}">
										@if ($errors->has('state'))
											<span class="help-block">
												<strong>{{ $errors->first('state') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
									<div class="input-icon">
										<i class="ti-map"></i>
										<input type="text" id="location" class="form-control" name="location" placeholder="Location" value="{{ old('location') }}">
										@if ($errors->has('location'))
											<span class="help-block">
												<strong>{{ $errors->first('location') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<div class="input-icon">
										<i class="ti-lock"></i>
										<input type="password" id="password" class="form-control" name="password" placeholder="Password" autocomplete="false" value="">
										@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									<select class="form-control" name="gender">
										<option disabled selected><b>Gender</b></option>
										<option value="male"><b>Male</b></option>
										<option value="female"><b>Female</b></option>
									</select>
									</div>
									<button class="btn btn-common log-btn">Register</button>
								</div>
							</form>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@include('partials.footer')

@endsection
