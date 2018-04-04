@section('content')
@include('partials.header2')
<div class="author-info">
							 <h3>{{ ucfirst($user->name) }}</h3>
							<p class="sub-title"> </p>
							<p><span class="address"><i class="ti-location-pin"></i>{{ $user->state }}, {{ $user->location }},</span> <span><i class="ti-phone"></i>{{ $user->phone_no }}</span></p>
							<div class="social-link">
								<a class="twitter" target="_blank" data-original-title="twitter" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
								<a class="facebook" target="_blank" data-original-title="facebook" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
								<a class="google" target="_blank" data-original-title="google-plus" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
								<a class="linkedin" target="_blank" data-original-title="linkedin" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="dash-box dash-box-color-1">
								<div class="dash-box-icon">
									<i class="fa fa-briefcase"></i>
								</div>
@endsection