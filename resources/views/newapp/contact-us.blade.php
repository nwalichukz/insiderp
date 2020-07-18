@inject('Helper', 'App\HelperClass')
@extends('layouts.newlayout')
@section('content')
		
		<!--CONTENT START-->
		<div class="content">
			<div class="kf_contact_map">
				<div id="map-canvas" class="map-cnvas"></div>
			</div>
			<div class="kf_contact_wrap">
				<!--CONTAINER START-->
				<div class="container">
					<div class="kf_about_text">
						<div class="section_heading hdg_2">
							<h2>Contact Us</h2>
							<span></span>
						</div>
						<p></p>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="kf_contact_info">
								<ul>
									<li>
										<div class="kf_contact_list">
											<span><i class="fa fa-envelope"></i></span>
											<div class="kf_contact_info_txet">
												<h5>Mail</h5>
												<a href="#">askinsiderperspective@gmail.com</a>
											</div>
										</div>
									</li>
									<li>
										<div class="kf_contact_list">
											<span><i class="fa fa-phone"></i></span>
											<div class="kf_contact_info_txet">
												<h5>Phone</h5>
												<a href="#"></a>
											</div>
										</div>
									</li>
									<li>
										<!--<div class="kf_contact_list">
											<span><i class="fa fa-map-marker"></i></span>
											<div class="kf_contact_info_txet">
												<h5>Address</h5>
												<a href="#">30 Ab 1 Johar Town F2 Block D, USA</a>
											</div>
										</div>-->
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-8">
							<div class="kf_leave_comment">
								<div class="section_heading hdg_2">
									<h2>Leave Message</h2>
									<span></span>
								</div>
								<div class="row">
								<form action="{{url('/send-enquiry')}}" method="POST">
									<div class="col-md-6">
										<div class="kf_commet_field">
											<input placeholder="Your Name" name="name" type="text" value="" data-default="Name*"  required>
										</div>
										<div class="kf_commet_field">
											<input placeholder="Your Email" name="email" type="text" value="" data-default="Name*" required>
										</div>
										<div class="kf_commet_field">
											<input placeholder="Subject e.g Enquiry" name="subject" type="text" value="" data-default="Name*"  required>
										</div>
										<p class="form-submit contact"><input name="submit" type="submit" class="theam_btn_large" value="Send Us Now"></p>
									</div>
									<div class="col-md-6">
										<div class="kf_textarea contact">
											<textarea placeholder="Your Message" name="message" required></textarea>
										</div>
									</div>

								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--CONTAINER END-->
			</div>	
			
			<!--KF NEWSLETTER WRAP END-->
		</div>
	@endsection