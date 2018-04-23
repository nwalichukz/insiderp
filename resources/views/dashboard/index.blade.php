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
			<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
				<h4>Your Services</h4>
				<hr>
			</div>
			@foreach($services as $service)
				@if($total > 0)
					<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
					<div class="manager-resumes-item">
						<div class="manager-content">
							<a href="resume.html"><img class="resume-thumb" src="assets/img/jobs/avatar-1.jpg" alt=""></a>
							<div class="manager-info">
								<div class="manager-name">
									<h4><a href="#">{{ ucfirst($service->name) }}</a></h4>
									<h5>{{ ucfirst($service->profession_title) }}</h5>
								</div>
								<div class="manager-meta">
									<span class="location"><i class="ti-location-pin"></i> {{ $service->location }}</span>
									<span class="rate"><i class="fa fa-money"></i> amount</span>
								</div>
							</div>
						</div>
						<div class="item-body">
							<p>{{ substr($service->description, 0, 35) }}</p>
							<hr>
							<div class="social-link">
								<a href="{{ route('viewService', ['id' => $service->id]) }}"  data-toggle="tooltip" data-placement="top" title="View Service"><i class="fa fa-eye"></i></a>
								<a href="{{ route('editService', ['id' => $service->id]) }}" data-toggle="tooltip" data-placement="top" title="Edit Service"><i class="fa fa-edit"></i></a>
								<a href="{{ route('deleteService', ['id' => $service->id]) }}" data-toggle="tooltip" data-placement="top" title="Delete Service"><i class="fa fa-remove"></i></a>
							</div>
						</div>
					</div>
				</div>
				@else
					<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
						<p>You currently have no service, <a href="{{ url('/service') }}">Click here</a> to become a vendor</p>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>
</div>
@include('partials.footer')

@endsection