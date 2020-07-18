@inject('Helper', 'App\HelperClass')
@extends('layouts.newlayout')
@section('content')
		
		<!--CONTENT START-->
		<div class="content">
			<div class="container">
				<div class="detail_row">
					<div class="kf_detail_text">
						<a class="theam_btn" href="#">{{$trend->category}}</a>
						<h2>{{title_case($trend->title)}}</h2>
						<ul class="bit_meta meta_2 meta_3">
							<li><a href="#"><i class="fa fa-calendar-check-o"></i>{{$trend->created_at->diffForHumans()}}</a></li>
							<li><a href="#"><i class="fa fa-user"></i>@if(!empty($trend->guest_name))
							{{$trend->guest_name}} @else
							InsiderPost @endif</a></li>
							<li><a href="#"><i class="fa fa-eye"></i>{{$trend->rank}} views</a></li>
						</ul>
					</div>
					<div class="kf_detail_slide">
						<div class="kf_detail_fig">
							<figure class="overlay">
								<img style="max-height:600px;" src='{{asset("/images/post/".$trend->postimage->name)}}' alt="post image">
								<figcaption>
									<span>{{$trend->created_at->day}}</span>
									<strong>{{$trend->created_at->format('M')}}</strong>
								</figcaption>
							</figure>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9">
							<div class="kf_detail_list" style="font-size:2em;">
								{!!$trend->post!!}
								
								
										<br/><br/>
								<div class="blog_meta_list">
									<a href="#"><i class="fa fa-share"></i> <h5>Share This Post :</h5></a>
									<ul class="kf_share_link">
										<li><a class="theam_btn_large blue" href="https://www.facebook.com/sharer.php?u={{url()->full()}}"><i class="fa fa-facebook"></i>Facebok</a>
										<a class="theam_btn_large light_blue" href="https://www.twitter.com/share?url={{url()->full()}}"><i class="fa fa-twitter"></i>Twitter</a><a class="theam_btn_large blue_white" href="#"><i class="fa fa-linkedin"></i>linked In</a></li>
									</ul>
								</div>
								
								<div class="kf_comments">
								<br/><br/>
								@if(!empty($Helper->commentAll($trend->id)))
									<h3 class="comment_title">{{$Helper->commentCount($trend->id)}} Comments</h3>
									<ul id="kode-comment" class="comment">
									
									@foreach($Helper->commentAll($trend->id) as $comment)
										<li>
											<div class="comment_item">
												<figure>
													<img src="extra-images/comment.jpg" alt="">
												</figure>
												<div class="comment_text">
													<h4><a href="#">@if(!empty($comment->name)){{$comment->name}} @else 
													{{ $Helper->commenter($comment->user_id)->name}} @endif</a></h4>
													<p>{{$comment->comment}}</p>
													<a class="replay" href="#"><i class="fa fa-reply"></i>Reply</a>
												</div>
											</div>
										</li>
										@endforeach
									
									</ul>
									@endif
								</div>
									
								<div class="kf_like_post">
									<h3 class="comment_title">You May Also Like</h3>
									<div class="row">
									@if(!empty($related))
									@foreach($related as $rl)
										<div class="col-md-4">
											<div class="kf_blog_medium grid">
												<figure>
													<img style="height:230px;" src='{{asset("/images/post/".$rl->postimage->name)}}' alt="">
												</figure>
												<div class="kf_blog_text">
													<h6><a href="{{ url($rl->id.'/'.str_slug(strtolower($rl->title), '-')) }}">
													{{$Helper->get_title(title_case(strtolower($rl->title)), 30)}}</h6>
													
												</div>
											</div>
										</div>
									@endforeach
									@endif
									</div>
								</div>

								<div class="kf_leave_comment">
									<h3 class="comment_title">Leave A Reply</h3>
									<form method="POST" action="{{url('/post-comment')}}">
									<input type="hidden" name="post_id" id="postid" value="{{$trend->id}}">
									   {{ csrf_field() }}
									<div class="row">
										<div class="col-md-6">
											<div class="kf_commet_field">
												<input placeholder="Your Name" name="name"  size="30" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="kf_commet_field">
												<input placeholder="Your Email (optional)" name="email" type="text">
											</div>
										</div>
									
										<div class="col-md-12">
											<div class="kf_textarea">
												<textarea placeholder="Your Message" name="comment" required></textarea>

												<p class="form-submit">
												<input name="submit" type="submit" class="theam_btn_large theam_bg_color" value="Send Now"></p>
											</div>
										</div>

									</div>
								</form>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<!--SIDE BAR WRAP START-->
							<div class="side_bar_wrap">
								<!--<div class="kf_top_story">
									<div class="section_heading hdg_2">
										<h2 class="font_size">Sponsored</h2>
										<span></span>
									</div>
								</div>-->
								<!--<div class="kf_side_fig">
									<figure>
										<img src="extra-images/side-blog.jpg" alt="">
									</figure>
									<div class="kf_side_fig_text">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam is theis
											 nonummy nibh...</p>
									</div>
								</div>-->
								
								<!--KF SELLING ADD OVERLAY START-->
								<!--<div class="kf_selling_add overlay">
									<h3>Best Selling WordPress Theme</h3>
									<h3>Banner Area</h3>
									<h3>269 x 292</h3>
									<a class="theam_btn_large theam_bg_color" href="#">Purchase Now</a>
								</div>-->
								<!--KF SELLING ADD OVERLAY END-->
								<div class="kf_blog_list margin-30">
									<div class="kf_top_story">
										<div class="section_heading hdg_2">
											<h2 class="font_size">From The same Category</h2>
											<span></span>
										</div>
									</div>
									<ul>
									@if(!empty($bycat))
									@foreach($bycat as $cat)
										<li>
											<div class="kf_blog_modren">
												<figure>
													<img src='{{asset("/images/post/".$cat->postimage->name)}}' style="height:230px; width:100%;" alt="Post image">
												</figure>
												<div class="kf_blog_modren_text">
													<h6>{{$Helper->get_title(title_case(strtolower($cat->title)), 15)}}</h6>
													<ul class="bit_meta meta_2 meta_4">
														<li><a href="{{ url($cat->id.'/'.str_slug(strtolower($cat->title), '-')) }}">
														@if(!empty($cat->guest_name))
														<i class="fa fa-user"></i>
														{{$cat->guest_name}}
														 @endif
														</a></li>
														
													</ul>
												</div>
											</div>
										</li>
										@endforeach
									@endif
									</ul>
								</div>
								<!--KF SOCIAL LIST START-->
							
							
								<!--Category Wrap End-->
								
							</div>
							<!--SIDE BAR WRAP END-->
						</div>
					</div>
				</div>
			</div>
		
		</div>
		<!--CONTENT END-->
		
@endsection