@extends('layouts.app')
@section('title')
Password Reset | Bido
@endsection

@section('content')
	@include('partials.header2')

<div id="content" class="my-account">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
				<div class="my-account-form">
						<h3><a href="#">Reset Password</a></h3>
					<hr>
					<div id="cd-login" class="is-selected">
						<div class="page-login-form">
							<form role="form" class="login-form" action="{{ route('post-reset-password') }}" method="post">
								{{ csrf_field() }}
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<div class="input-icon">
										<i class="ti-user"></i>
										<input type="text" id="email" class="form-control" name="email" placeholder="Enter your email used to register here e.g jon@gmail.com" >
										@if ($errors->has('phone_no'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('email') }}</strong>
				                            </span>
				                        @endif
									</div>
								</div>
								<button class="btn btn-common log-btn">Reset</button>
							</form>
						</div>
					</div>
				</div>
				@include('partials.errors')
			</div>
		</div>
	</div>
</div>



@include('partials.footer')


@endsection
