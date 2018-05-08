@extends('layouts.app')
@section('title')
	{{ $user->name }} | Bido
@endsection
@section('content')
	@include('partials.header2')

	<div id="content">
		<section class="job-detail section">
			<div class="container">
				@if($user->service)
					<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="header-detail">
							<div class="header-content pull-left">
								<h3><a href="#">{{ $service->name }}</a></h3>
								<p><span>Date Created: {{ $service->created_at->diffForHumans() }}</span></p>
								<p>Amount: <strong class="price">$7000 - $7500</strong></p>
							</div>
							<div class="detail-company pull-right text-right">
								<div class="img-thum">
									@if(!empty($user->avater->avater))
										<img src='{{ asset("images/user/". $user->avater->avater) }}' class="img-responsive" alt="avatar">
									@endif
								</div>
								<div class="name pull-rightf">
									<h4>{{ $service->profession_title }}</h4>
									<h5>{{ ucfirst($service->location) }}</h5>
								</div>
							</div>
							<div class="clearfix">
								<div class="meta">
									<span><a class="btn btn-border btn-sm" href="{{ url('service/edit', $service->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Service"><i class="fa fa-edit"></i> Edit Service</a></span>
									<span><a class="btn btn-border btn-sm" href="" data-toggle="modal" data-target="#previousWorksModal" data-placement="top" title="Add Previous Works Images"><i class="fa fa-edit"></i> Previous Works</a></span>
									<span><a class="btn btn-border btn-sm" href="{{ url('service/delete/'. $service->id.'/'.$service->vendor_id) }}" data-toggle="tooltip" data-placement="top" title="Delete Service"><i class="fa fa-close"></i> Delete Service</a></span>
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
											<div class="dash-box dash-box-color-3">
												<div class="dash-box-icon">
													<i class="fa fa-handshake-o"></i>
												</div>
												<a href="{{ url('job-offers', $service->id) }}">
													<div class="dash-box-body">
														<span class="dash-box-count">5</span>
														<span class="dash-box-title">Job Offers</span>
													</div>
												</a>

												<div class="dash-box-action">
													<a href="{{ url('job-offers', $service->id) }}">More Info</a>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="dash-box dash-box-color-1">
												<div class="dash-box-icon">
													<i class="fa fa-briefcase"></i>
												</div>
												<a href="{{ url('ongoing-jobs', $service->id) }}">
													<div class="dash-box-body">
														<span class="dash-box-count">8</span>
														<span class="dash-box-title">Ongoing Jobs</span>
													</div>
												</a>

												<div class="dash-box-action">
													<a href="{{ url('ongoing-jobs', $service->id) }}">More Info</a>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="dash-box dash-box-color-2">
												<div class="dash-box-icon">
													<i class="fa fa-file-code-o"></i>
												</div>
												<a href="{{ url('completed-jobs', $service->id) }}">
													<div class="dash-box-body">
														<span class="dash-box-count">3</span>
														<span class="dash-box-title">Jobs Completed</span>
													</div>
												</a>

												<div class="dash-box-action">
													<a href="{{ url('jobs-completed', $service->id) }}">More Info</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@else
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							@include('partials.sidebar')
						</div>
						<div class="col-md-9 col-sm-12 col-xs-12">
							<p>You are currently not a vendor <a href="{{ url('service') }}" style="color: #cb1d1d">Register a service</a> to become a vendor...</p>
							<hr>
						</div>
					</div>
				@endif
			</div>
		</section>
	</div>
	<!-- line modal -->
	<div class="modal fade" id="previousWorksModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					<h3 class="modal-title" id="lineModalLabel">Add previous work images</h3>
				</div>
				<div class="modal-body">

					<!-- content goes here -->
					<form action="{{ route('workImages') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="attachment">attach files:</label>
							<input type="file" name="files[]" id="files" class="form-control">
						</div>


						<button type="submit" class="btn btn-common">Send Preview</button>
					</form>

				</div>
				<div class="modal-footer">
					<div class="btn-group btn-group-justified" role="group" aria-label="group button">
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
						</div>
						<div class="btn-group btn-delete hidden" role="group">
							<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('partials.footer')
@endsection