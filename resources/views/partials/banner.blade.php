<!-- Banner
================================================== -->
<div class="search-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Find the person that fits your taste</h1>
				<br>
				<h2>More than <strong>12,000</strong> people are waiting to get your job jone!</h2>
				<div class="content">
					<form method="post" action="{{ route('search') }}">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<input class="form-control" type="text" name="profession_title" placeholder="Profession you are looking for">
									<i class="ti-time"></i>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<input class="form-control" type="text" name="location" placeholder="state / city / province">
									<i class="ti-location-pin"></i>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="search-category-container">
									<label class="styled-select">
									<select class="dropdown-product selectpicker" name="service_category">
										<option value="">Select Service Category</option>
										<option>Entertainment</option>
										<option>Business</option>
										<option>Education/Training</option>
										<option>Art/Design</option>
										<option>Events and Lifestyle</option>
										<option>Programming and IT</option>
										<option>Sewing and Makeups</option>
										<option>Repairs</option>
									</select>
									</label>
								</div>
							</div>
							<div class="col-md-1 col-sm-6">
								<button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>