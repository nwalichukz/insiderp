@inject('Helper', 'App\HelperClass')
@extends('layouts.newlayout')
@section('content')
		
		<!--CONTENT START-->
		<div class="content ">
			<!--KF MAGZINE LIST START-->
			<div class="kf_magazine_list padding_list">
				<!--CONTAINER START-->
				<div class="container">
					<div class="col-md-9 responsive_padding">
						<div class="section_heading">
							<h2>{{$category}}</h2>
							<span></span>
                        </div>
                        @if(!empty($posts))
						@foreach($posts as $post)
						<div class="kf_news_list">
							<figure>
								<img style="width: 250px;" src='{{asset("/images/post/".$post->postimage->name)}}' alt="post image">
							</figure>
							<div class="kf_news_text text_2">
								
								<h3><a href="{{ url($post->id.'/'.str_slug(strtolower($post->title), '-')) }}">{{$Helper->get_title(title_case(strtolower($post->title)), 20)}}</a></h3>
								<ul class="bit_meta meta_2 meta_5">
									<!--<li><a href="#"><i class="fa fa-user"></i>John Throat</a></li>
									<li><a href="#"><i class="fa fa-calendar-check-o"></i>3 Months</a></li>-->
								</ul>
								<p>{{strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($post->post, 40))))}}.</p>
								<a class="theam_btn_large" href="{{ url($post->id.'/'.str_slug(strtolower($post->title), '-')) }}">See More</a>
							</div>
                        </div>
						@endforeach
                        @endif
				
										
					</div>
					<div class="col-md-3 responsive_padding">
						<!--SIDE BAR WRAP START-->
						<div class="side_bar_wrap">
							<div class="kf_top_story">
								<div class="section_heading hdg_2">
									<h2 class="font_size">Sponsored</h2>
									<span></span>
								</div>
							</div>
							<div class="kf_side_fig">
								<figure>
									<img src="extra-images/side-blog.jpg" alt="">
								</figure>
								<div class="kf_side_fig_text">
									<p> </p>
								</div>
							</div>
							
							<!--KF SELLING ADD OVERLAY START-->
							<div class="kf_selling_add overlay">
								<h3>InsiderPerspective your best</h3>
								<h3>place for reading</h3>
								<h3>great articles.</h3>
								<a class="theam_btn_large theam_bg_color" href="#">Welcome</a>
							</div>
							<!--KF SELLING ADD OVERLAY END-->
							<div class="kf_blog_list margin-30">
								<!--<div class="kf_top_story">
									<div class="section_heading hdg_2">
										<h2 class="font_size">Recent Post</h2>
										<span></span>
									</div>
								</div>-->
								<!--<ul>
									<li>
										<div class="kf_blog_modren">
											<figure>
												<img src="{{ asset('extra-images/side-list-fig.jpg')}}" alt="">
											</figure>
											<div class="kf_blog_modren_text">
												<h6>Pound volatile after Bank vote</h6>
												<ul class="bit_meta meta_2 meta_4">
													<li><a href="#"><i class="fa fa-user"></i>John Throat</a></li>
													<li><a href="#"><i class="fa fa-calendar-check-o"></i>3 Months</a></li>
												</ul>
											</div>
										</div>
									</li>
								
								</ul>-->
							</div>
							
							
						</div>
						<!--SIDE BAR WRAP END-->
					</div>
					<div class="margin-left:200px; margin-right:200px;">{{$posts->links()}} </div>
				</div>
				<!--CONTAINER END-->
			</div>
			<!--KF MAGZINE LIST END-->			
			
			<!--KF NEWSLETTER WRAP END-->
		</div>
		<!--CONTENT END-->	
	@endsection