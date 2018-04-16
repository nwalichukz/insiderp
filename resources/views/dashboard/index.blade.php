@extends('layouts.app')

@section('title')
Dashboard | welcome
@endsection

@section('content')
@include('partials.header2')

<!-- Titlebar
================================================== -->

<div id="content">
	<section class="job-detail section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="header-detail">
						<div class="header-content pull-left">
							<h3><a href="#">{{ $user->name }}</a></h3>
							<p>Joined: <strong class="price">{{ $user->created_at->diffForHumans() }}</strong></p>
							<p>Location: <strong class="price"><i class="fa fa-map-marker"></i> {{ ucfirst($user->state) }}, {{ ucfirst($user->location) }}</strong></p>
							<p>Phone Number: <strong class="price"><i class="fa fa-phone"></i> {{ $user->phone_no }}</strong></p>
							<p>Email: <strong class="price">{{ $user->email }}</strong></p>
						</div>
						<div class="detail-company pull-right text-right">
							<div class="img-thuml">
								<img class="img-responsive" style="width: 200px; height: 150px;" src="{{ asset('assets/img/jobs/recent-job-detail.jpg') }}" alt="">
							</div>
						</div>
						<div class="clearfix">
							<div class="meta">
								<div class="social-link">
									<a href="#"  data-toggle="tooltip" data-placement="top" title="Edit Profile"><i class="fa fa-edit"></i></a>
									<a href="#" data-toggle="tooltip" data-placement="top" title="Update Avatar"><i class="fa fa-image"></i></a>
									<a href="#" data-toggle="tooltip" data-placement="top" title="Create Service"><i class="fa fa-pencil"></i></a>
									<a href="#" data-toggle="tooltip" data-placement="top" title="Account Overview"><i class="fa fa-database"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="content-area">
						<div class="clearfix">
							<div class="box">
								<h4>Basic Information</h4>
								<div class="row">
									<div class="col-md-4">
										<div class="dash-box dash-box-color-1">
											<div class="dash-box-icon">
												<i class="fa fa-briefcase"></i>
											</div>
											<a href="{{ url('my-services') }}">
												<div class="dash-box-body">
													<span class="dash-box-count">{{ $user->service->count() }}</span>
													<span class="dash-box-title">Services</span>
												</div>
											</a>

											<div class="dash-box-action">
												@if($user->service->count() < 1)
													<a href="{{ url('service') }}">Create service</a>
												@else
													<a href="{{ url('my-services') }}">More Info</a>
												@endif
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="dash-box dash-box-color-3">
											<div class="dash-box-icon">
												<i class="fa fa-handshake-o"></i>
											</div>
											<a href="{{ url('job-offers') }}">
												<div class="dash-box-body">
													<span class="dash-box-count">5</span>
													<span class="dash-box-title">Job Offers</span>
												</div>
											</a>

											<div class="dash-box-action">
												<a href="{{ url('job-offers') }}">More Info</a>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="dash-box dash-box-color-2">
											<div class="dash-box-icon">
												<i class="fa fa-database"></i>
											</div>
											<a href="{{ url('overview') }}">
												<div class="dash-box-body">
													<span class="dash-box-count"></span>
													<span class="dash-box-title">Account Overview</span>
												</div>
											</a>

											<div class="dash-box-action">
												<a href="{{ url('overview') }}">More Info</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@include('partials.footer')

@endsection