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

							 <h3>{{ ucfirst($service->name) }}</h3>
							<p class="sub-title">{{ $service->profession_title }} </p>
							<p><span class="address"><i class="ti-location-pin"></i>{{ $service->location }}</span> <span><i class="ti-phone"></i></span></p>

							<div class="social-link">
								<a href="{{ url('service/edit', $service->id) }}" data-toggle="tooltip" data-placement="top" title="Edit service"><i class="fa fa-edit"></i></a>
                                 
								 <a href="{{ url('edit/image/'.$service->id.'/'.$service->user_id) }}"  data-toggle="tooltip" data-placement="top" title="Edit image"><i class="fa fa-picture-o"></i></a>
								 <a href="{{ url('service/delete/'. $service->id.'/'.$service->vendor_id) }}" data-toggle="tooltip" data-placement="top" title="Remove service"><i class="fa fa-close"></i></a>
							</div>
						</div>
					</div>

					</div>
					@endforeach
					
			</div>
		</div>
	
	</div>
</div>
</div>
@include('partials.footer')

@endsection