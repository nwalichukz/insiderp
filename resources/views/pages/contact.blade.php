@extends('layouts.app')
@section('title')
Contact us | Bido
@endsection

@section('content')
@include('partials.header2')
<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2 class="medium-title">
					Contact Us
				</h2>
				<div class="information">
					<div class="contact-datails">
						<div class="icon">
							<i class="ti-location-pin"></i>
						</div>
						<div class="info">
							<h3>Address</h3>
							<span class="detail">Main Office: NO.10 Ihioma Street, Along Nike Lake Rd, Abakpa Nike, 
							Enugu, Nigeria</span>
						</div>
					</div>
					<div class="contact-datails">
						<div class="icon">
							<i class="ti-mobile"></i>
						</div>
						<div class="info">
							<h3>Phone Numbers</h3>
							<span class="detail">Main Office: 07065119492</span>
							
						</div>
					</div>
					<div class="contact-datails">
						<div class="icon">
							<i class="ti-location-arrow"></i>
						</div>
						<div class="info">
							<h3>Email Address</h3>
							<span class="detail">Customer
							Support: askbido@gmail.com</span>
				
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<form action="{{ url('post-enquiry')}}" class="contact-form" method="POST" data-toggle="validator">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required data-error="Please enter your name">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								 <div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="email" name="email" placeholder="mail@sitename.com" required data-error="Please enter your email">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" placeholder="Enter phone number" name="phone_no" id="msg_subject" class="form-control" required data-error="Please enter your subject">
									<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" id="message" name="message" placeholder="Massage" rows="11" data-error="Write your message" required></textarea>
										<div class="help-block with-errors"></div>
										</div>
								</div>
								<div class="col-md-12">
									<button type="submit" id="submit" class="btn btn-common">Send Us</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			@include('partials.footer')
		</div>
	</div>
</section>
@endsection