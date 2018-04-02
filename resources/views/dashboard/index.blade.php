@extends('layouts.app')

@section('title')
Dashboard | welcome
@endsection

@section('content')
@include('partials.header2')

<!-- Titlebar
================================================== -->

<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				@include('partials.sidebar')
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="inner-box my-resume">
					<div class="author-resume">
						<div class="thumb">
							<img src="{{ asset('images/avatar-placeholder.png') }}" alt="" class="img-responsive avatar">
						</div>
						<div class="author-info">
							 <h3>{{ ucfirst($user->name) }}</h3>
							<p class="sub-title">{ Profession_title }</p>
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
								<a href="#">
									<div class="dash-box-body">
										<span class="dash-box-count">{ Count }</span>
										<span class="dash-box-title">Number of services</span>
									</div>
								</a>

								<div class="dash-box-action">
									<a href="#">More Info</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="dash-box dash-box-color-2">
								<div class="dash-box-icon">
									<i class="fa fa-handshake-o"></i>
								</div>
								<a href="#">
									<div class="dash-box-body">
										<span class="dash-box-count">{ Count }</span>
										<span class="dash-box-title">Ongoing Jobs</span>
									</div>
								</a>

								<div class="dash-box-action">
									<a href="#">More Info</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="dash-box dash-box-color-3">
								<div class="dash-box-icon">
									<i class="fa fa-file-archive-o"></i>
								</div>
								<a href="#">
									<div class="dash-box-body">
										<span class="dash-box-count">{ Count }</span>
										<span class="dash-box-title">Jobs Completed</span>
									</div>
								</a>

								<div class="dash-box-action">
									<a href="#">More Info</a>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
@include('partials.footer')

@endsection