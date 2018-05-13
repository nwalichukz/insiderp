@extends('layouts.app')
@section('title')
Login | Sign up
@endsection

@section('content')
	@include('partials.header2')

<div id="content" class="my-account">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
				<div class="my-account-form">
						<h3><a href="#">Login</a></h3>
					<hr>
					<div id="cd-login" class="is-selected">
						<div class="page-login-form">
							<form role="form" class="login-form" action="{{ route('login') }}" method="post">
								{{ csrf_field() }}
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<div class="input-icon">
										<i class="ti-user"></i>
										<input type="text" id="phone_no" class="form-control" name="email" placeholder="Enter your email e.g jon@gmail.com" >
										@if ($errors->has('phone_no'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('email') }}</strong>
				                            </span>
				                        @endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<div class="input-icon">
										<i class="ti-lock"></i>
										<input type="password" name="password" class="form-control" placeholder="Password">
										@if ($errors->has('password'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('password') }}</strong>
				                            </span>
				                        @endif
									</div>
								</div>
								<button class="btn btn-common log-btn">Login</button>
								<div class="checkbox-item">
									<div class="checkbox">
										<label for="rememberme" class="rememberme">
											<input name="remember" id="rememberme" value="forever" type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember Me
										</label>
									</div>
									<p class="cd-form-bottom-message"><a href="#0">Lost your password?</a></p>
								</div>
							</form>
						</div>
					</div>
					<div class="page-login-form" id="cd-reset-password"> 
						<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
						<form class="cd-form">
							<div class="form-group">
								<div class="input-icon">
									<i class="ti-email"></i>
									<input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
								</div>
							</div>
							<p class="fieldset">
								<button class="btn btn-common log-btn" type="submit">Reset password</button>
							</p>
						</form>
						<p class="cd-form-bottom-message"><a href="#">Back to log-in</a></p>
					</div>
				</div>
				@include('partials.errors')
			</div>
		</div>
	</div>
</div>



@include('partials.footer')


@endsection
