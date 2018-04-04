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
			<div class="col-md-3 col-sm-3 col-xs-12">
				@include('partials.sidebar')
			</div>
			
			<div class="col-md-9 col-sm-9 col-xs-12">
				<div class="inner-box my-resume">
					@foreach($services as $service)
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="author-resume">
						<div class="thumb">
							<img src="{{ asset('images/avatar-placeholder.png') }}" alt="" class="img-responsive avatar">
						</div>

						<div class="author-info">

							<div class="social-link">
								<a href="{{ url('service/edit', $service->id) }}" data-toggle="tooltip" data-placement="top" title="Edit service"><i class="fa fa-edit"></i></a>
                                 
								 <a href="{{ url('edit/image/'.$service->id.'/'.$service->user_id) }}"  data-toggle="tooltip" data-placement="top" title="Edit image"><i class="fa fa-picture-o"></i></a>
								 <a href="{{ url('service/delete/'. $service->id.'/'.$service->vendor_id) }}" data-toggle="tooltip" data-placement="top" title="Remove service"><i class="fa fa-close"></i></a>
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
										<span class="dash-box-title">My Service</span>
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
>>>>>>> 01ab9e8bf8a6c97b71d9e9d2c44f9c3e64aabc23
					</div>
					@endforeach
					
			</div>
		</div>
	
	</div>
</div>
</div>
@include('partials.footer')

@endsection