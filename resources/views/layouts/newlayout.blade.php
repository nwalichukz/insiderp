<!DOCTYPE html>
<html lang="en">
  
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	@if(!empty($pg))
        <meta name="description"
              content="{!!strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($trend->post, 30))))!!}">
		<meta property="og:description"
			 content="{!!strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($trend->post, 30))))!!}">
    @else
        <meta name="description" content="InsiderPerspective is the best website providing great articles about 
		businesses and  other interesting topics.">
    @endif
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
	  @if(!empty($title))
            {{ title_case($title) }}
        @elseif(!empty($fulltitle))
            {{ title_case($fulltitle) }}
        @else
            InsiderPerspective

        @endif
	</title>

<!--Open graph for title-->
	@if(!empty($title))
	<meta property="og:title" content=" {{ title_case($title) }}">
           
        @elseif(!empty($fulltitle))
	<meta property="og:title" content=" {{ title_case($fulltitle) }}">
            
        @else
            
	<meta property="og:title" content=" InsiderPerspective">
        @endif

	<meta property="og:image" content="@if(!empty($trend->postimage->name)) {{asset('/images/post/'.$trend->postimage->name)}} @endif">
	
	<meta property="og:url" content="{{ url()->full()}}">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Font-awesome -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Slick Slider -->
    <link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet">
	 <!-- Slick Slider -->
    <link href="{{ asset('assets/css/prettyphoto.css') }}" rel="stylesheet">
    <!-- Typography -->
    <link href="{{ asset('assets/css/typography.css') }}" rel="stylesheet">
	<link href="{{ asset('svg-icon.css') }}" rel="stylesheet">
	 <!-- widget.css -->
    <link href="{{ asset('assets/css/side-widget.css') }}" rel="stylesheet">
    <!-- component-responsive.css -->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
	 <!-- component-responsive.css -->
    <link href="{{ asset('assets/css/component.css') }}" rel="stylesheet">
    <!-- shortcodes.css -->
    <link href="{{ asset('assets/css/shortcodes.css') }}" rel="stylesheet">
    <!-- colors.css -->
    <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet">
    <!-- style.css -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">
	<style>
	p>a:link{
		color:#1E90FF;
	}

	a:hover{
		color:orange;
	}
	</style>
	
  </head>
  <body>
    <!-- wrapper-->
    <div class="wrapper">
        <!--header-->
		<header>
			<!--KF TOP WRAP START-->
			<div class="kf_top_wrap">
				<!--KF TOP BAR START-->
				<div class="kf_top_bar">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<div class="kf_top_left_text">
									<span><a href="{{url('/')}}">InsiderPerspective</a></span>
									<div class="top-news-slide">
										<!--<div>
											<p>BlogMag Launches Bitcoin Essay Series With Author</p>
										</div>
										<div>
											<p>BlogMag Launches Bitcoin Essay Series With Author</p>
										</div>-->
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="kf_top_right_text">
									<span>{{date('l, F j')}}</span>
									<ul class="top_icon">
										<li><a href="https://www.facebook.com/sharer.php?u={{url()->full()}}"><i class="fa fa-facebook"></i></a></li>
										<li><a href="https://www.twitter.com/share?url{{url()->full()}}"><i class="fa fa-twitter"></i></a></li>
										<li><a href="https://www.linkedin.com/shareArticle?url={{url()->full()}}"><i class="fa fa-linkedin"></i></a></li>
										<!--<li><a href="#"><i class="fa fa-rss"></i></a></li>-->
										@if(Auth::guest())
									   <li><a href="{{ url('/login') }}">login</a></li>
							     	   <!--<li class="nav-li"><a href="{{ url('/register') }}">sign up</a></li> -->
										@else
								      <li>
								      <a style="font:blue;" href="{{url('/dashboard/'.Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}"> <i class="fa fa-dashboard"></i></a></li>
									  <li><a href="{{ url('/logout') }}">logout</a></li>

								   @endif
									</ul>
									<div class="top_drop_btn">
										<div class="dropdown">
										  <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true">
											<!--<img src="{{ asset('images/country_fig.png')}}" alt="">-->
										  </button>
										  <!--<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<li><a href="#"><img src="images/country_fig.png" alt="">U.S</a></li>
											<li><a href="#"><img src="images/country_fig.png" alt="">A.S</a></li>
											<li><a href="#"><img src="images/country_fig.png" alt="">U.A</a></li>
										  </ul>-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--KF TOP BAR END-->
			</div>
			<!--KF TOP WRAP END-->
			
			<!--KF LOGO WRAP START-->
			<div class="kf_logo_wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="kf_logo">
								<a href="{{url('/')}}" style="font-size:2.5em; color:#000; font-family:cursive; font-weight:bold;">
								InsiderPerspective
								<img src="" alt=""></a>
							</div>
						</div>
						<!--<div class="col-md-8">
							<div class="kf_banner_add overlay">
								<div class="kf_add_text">
									<h5>Best Business,<br>News Website</h5>
								</div>
								<div class="kf_add_content">
									<h3>Your home for timeless</h3>
									<span>Piece.</span>
								</div>
							</div>
						</div>-->
					</div>
				</div>
			</div>
			<!--KF LOGO WRAP END-->
			
			<!--KF NAVI WRAP START-->
			<div class="kf_nav_wrap">
				<div class="container">
					<!--KF NAVIGATION ROW START-->
					<div class="kf_navigation_row">
						<div class="navigation">
							<ul>
								
								<li><a class="yellow_light_bg" href="{{ url('/')}}">Home</a>
									
								</li>
								<li><a class="blue_bg" href="{{ url('/category/Small Business/index')}}">Small Business</a></li>
								<li><a class="green_bg" href="{{ url('/category/Entrepreneurship/index')}}">Entrepreneurship</a>
									
								</li>
								<li class="mega_menu"><a class="parat_bg" href="{{url('/category/Money/index')}}">Money</a>
									
								</li>
								<li><a class="pinck_bg" href="{{url('/category/Business/index')}}">Business</a>
									
								</li>
								
								<li><a class="yellow_bg" href="#">categories</a>
								<ul class="child">
									@if(!empty($Helper->category()))
									@foreach($Helper->category() as $cat)
										<li><a href="{{url('/category/'.$cat->name.'/index')}}"> {{$cat->name}} </a></li>
									@endforeach
									@endif
									</ul>
							</li>
							</ul>
						</div>
						<!--DL Menu Start-->
						<div id="kode-responsive-navigation" class="dl-menuwrapper">
							<button class="dl-trigger">Open Menu</button>
							<ul class="dl-menu">
								<li class="active"><a class="active" href="{{url('/')}}">Home</a>
									
								</li>
								<li class="menu-item kode-parent-menu"><a href="{{url('/category/Small Business/index')}}">Small Business</a></li>
								<li class="menu-item kode-parent-menu"><a href="{{url('/category/Entrepreneurship/index')}}">Entrepreneurship</a>
									
								</li>
								<li class="menu-item kode-parent-menu"><a href="{{url('/category/Money/index')}}">Money</a></li>
								<li class="menu-item kode-parent-menu"><a href="{{url('/category/Business/index')}}">Business</a>
									
								</li>
							
								<li><a href="#">Categories</a>
								<ul class="dl-submenu">
								@if(!empty($Helper->category()))
									@foreach($Helper->category() as $cat)
										<li><a href="{{url('/category/'.$cat->name.'/index')}}"> {{$cat->name}} </a></li>
									@endforeach
									@endif
									</ul>
							</li>
							</ul>
						</div>
						<!--DL Menu END-->
						<form method="POST" action="{{url('/post-search')}}" class="comment_form">
						{{ csrf_field() }}
							<div class="kf_commet_field">
								<input placeholder="Type Keyword" name="search" type="text" data-default="Name*" size="30" required>
								<button><i class="fa fa-search"></i></button>
							</div>
						</form>
					</div>
					<!--KF NAVIGATION ROW END-->
				</div>
			</div>
			<!--KF NAVI WRAP END-->
		</header>
		
        @yield('content')

		
		<footer>
			<!--KF WIDGET WRAP START-->
			<div class="kf_widget_wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="kf_widget_text">
								<h3 class="widget_title">About Us</h3>
								<p>The place for your insider look on major topics.</p>
								
								<ul class="widget_info">
									<li>
										<div class="widget_info_list">
											<!--<i class="fa fa-phone"></i>-->
											<div class="widget_info_text">
												<!--<a href="#">+92 - 34 - 2797084</a>
												<a href="#">+92 - 36 - 6761448</a>-->
											</div>
										</div>
									</li>
									<li>
										<div class="widget_info_list">
										<i class="fa fa-envelope"></i>
											<div class="widget_info_text">
											
												<a href="mailto:insiderperspective2@gmail.com">insiderperspective2@gmail.com</a>
												
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<!--<div class="kf_widget_text">
								<h3 class="widget_title">Latest Post</h3>
								<div class="kf_blog_list">
									<ul>
										<li>
											<div class="kf_blog_modren">
												<figure>
													<img src="{{ asset('extra-images/blog.jpg')}}" alt="">
												</figure>
												<div class="kf_blog_modren_text">
													<h6>Business meeting held in a plane Before conference</h6>
													<ul class="bit_meta meta_2 meta_4">
														<li><a href="#"><i class="fa fa-user"></i>John Throat</a></li>
														<li><a href="#"><i class="fa fa-calendar-check-o"></i>3 Months</a></li>
													</ul>
												</div>
											</div>
										</li>
									
									</ul>
								</div>
							</div>-->
						</div>
						<div class="col-md-4">
							<div class="kf_widget_text">
								<h3 class="widget_title">Contact Us</h3>
								<p> </p>
								<form method="post" action="{{url('/send-enquiry')}}" id="commentform" class="comment_form">
									<div class="kf_commet_field">
										<input placeholder="Your Email" onClick="return false;" name="email" type="text" value="" data-default="Name*" size="30" required>
									</div>
									{{ csrf_field() }}
									<div class="kf_commet_field">
										<input placeholder="Your Name" onClick="return false;" name="name" type="text" value="" data-default="Name*" size="30" required>
									</div>
									<div class="kf_commet_field">
										<input placeholder="subject" onClick="return false;" name="subject" type="text" value="" data-default="Name*" size="30" required>
									</div>
									<div class="kode_textarea">
										<textarea placeholder="Your Message" onClick="return false;" name="message" required></textarea>
									</div>
									<p class="form-submit"><input name="submit" type="submit" class="theam_btn_large theam_bg_color" value="Send Us"></p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--KF WIDGET WRAP END-->
			
			<!--KF COPYRIGHT START-->
			<div class="kf_copyright">
				<div class="container">
					<div class="kf_copyright_text">
						<p><a href="{{url('/')}}"> © {{ date('Y')}} | Insiderperspective.com </a> </p> 
					</div>
				</div>
			</div>
			<!--KF COPYRIGHT END-->
		</footer>
	</div>
    <!--church wrapper ends-->
    <!-- jquery javascript-->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- Bootstrap script-->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
	<!-- modernizr script-->
    <script src="{{ asset('assets/js/jquery.prettyphoto.js') }}"></script>
	<!-- responsive-jquery script-->
    <script src="{{ asset('assets/js/jquery.downCount.js') }}"></script>
	<!-- responsive-jquery script-->
    <script src="{{ asset('assets/js/jquery.mkinfinite.js') }}"></script>
	<!-- responsive-jquery script-->
    <script src="{{ asset('assets/js/modernizr.custom.js') }}"></script>
	<!-- responsive-jquery script-->
    <script src="{{ asset('assets/js/jquery.dlmenu.js') }}"></script>
    <!-- Slick Slider script-->
    <script src=" {{ asset('assets/js/slick.js') }}"></script>
    <!-- Custom scripts-->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
  </body>

</html>