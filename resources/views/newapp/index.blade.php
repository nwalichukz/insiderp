@inject('Helper', 'App\HelperClass')
@extends('layouts.newlayout')
@section('content')
<!--CONTENT START-->
<div class="content">
    <!--KF BIT COIN START-->
    <div class="kf_bit_coin">
        <div class="container">
            <div class="kf_bit_coin_row">
                <div class="kf-bit-row-slide">
                    <div>
                        <!--Lead main-->
                        @if(!empty($lead->title))
                                @if(!empty($Helper->postImageFirst($lead->id)->name))
                        <div class="kf_bit_fig">
                            <figure class="overlay">
                            <img src="{{asset('images/post/'.$Helper->postImageFirst($lead->id)->name)}}" alt="post image" class="mb-3" style="height:500px;">
                                <figcaption class="bit_caption">
                                    <a class="theam_btn margin-bottom" href='{{ url("category/".$lead->category."/index")}}'>{{$lead->category}}</a>
                                    <h2>
                                    <a href="{{ url(str_slug(strtolower($lead->category), '-').'/'.$lead->id.'/'.str_slug(strtolower($lead->title), '-')) }}" class="text-md text-blue hover:underline hover:text-blue-dark">
                                    {{$Helper->get_title(title_case(strtolower($lead->title)), 13)}}</a>
                                    </h2>
                                    <br/>
                                    <br/>
                                 <!--<ul class="bit_meta">
                                        <li> </li>
                                        <li><a href="#"><i class="fa fa-eye"></i>  </a></li>
                                        <li><a href="#"><i class="fa fa-comment-o"></i>  </a></li>
                                    </ul>-->
                                </figcaption>
                            </figure>
                        </div>
                        @endif
                         @endif
                        <!--End of Lead main-->
                        <div class="kf_bit_side">
                            <!--lead-side starts -->
                            @if(!empty($sidelead))
                            @foreach($sidelead as $sl)
                            <div class="kf_bit_fig">
                                <figure class="overlay">
                                    <img src="{{asset('images/post/'.$Helper->postImageFirst($sl->id)->name)}}" alt="" style="height:246px;">
                                    <figcaption class="bit_caption">
                                        <a class="theam_btn margin-bottom" href="{{ url('category/'.$sl->category.'/index')}}">{{$sl->category}}</a>
                                        <h3>
                                        <a href="{{ url(str_slug(strtolower($sl->category), '-').'/'.$sl->id.'/'.str_slug(strtolower($sl->title), '-')) }}" class="text-md text-blue hover:underline hover:text-blue-dark">
                                    {{$Helper->get_title(title_case(strtolower($sl->title)), 13)}}</a>
                                    
                                    </h3>
                                    <br/>
                                    <br/>
                                        <!--<ul class="bit_meta">
                                            <li> </li>
                                            <li><a href="#"><i class="fa fa-clock-o"></i> </a></li>
                                            <li><a href="#"><i class="fa fa-share-alt"></i> </a></li>
                                        </ul>-->
                                    </figcaption>
                                </figure>
                            </div>
                            <!-- leade-side ends here-->
                        @endforeach
                        @endif
                        </div>
                    </div>
                    <div>
                        
                    </div>
                </div>
                <div class="kf_arrow">
                    <a href="#">10 OF 3</a>
                </div>
            </div>	
        </div>
    </div>
    <!--KF BIT COIN END-->
    
    <!--KF BIT BUSINESS START-->
    <div class="kf_bit_business">
        <div class="container">
            <div class="row">
                @if(!empty($posts))
                @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="kf_bit_fig fig_2">
                        <figure class="overlay">
                            <img src="{{asset('images/post/'.$Helper->postImageFirst($post->id)->name)}}" alt="post image" style="height:260px;">
                            <figcaption class="bit_caption">
                                <a class="theam_color" href="{{ url('category/'.$post->category.'/index')}}">{{$post->category}}</a>
                                <h4>
                                <a href="{{ url(str_slug(strtolower($post->category), '-').'/'.$post->id.'/'.str_slug(strtolower($post->title), '-')) }}" class="text-md text-blue hover:underline hover:text-blue-dark">
                                    {{$Helper->get_title(title_case(strtolower($post->title)), 13)}}</a>
                            </h4>
                            <br/>
                            <br/>
                                <!--<ul class="bit_meta meta_2">
                                    <li><a href="#"><i class="fa fa-calendar-check-o"></i>June 01, 2017</a></li>
                                    <li><a href="#"><i class="fa fa-user"></i>John Doe Aliin</a></li>
                                </ul>-->
                            </figcaption>
                        </figure>
                    </div>
                </div>
                @endforeach
           @endif

            </div>
        </div>
    </div>
    <!--KF BIT BUSINESS END-->
    
    <!--KF MAGZINE ADD START-->
    <div class="kf_magazine_add">
        <div class="container">
            <div class="kf_banner_add add_2 overlay">
                <div class="kf_add_text">
                    <h5>Best Business,<br>News Website</h5>
                </div>
                <div class="kf_add_content">
                    <h3>The Home to your</h3>
                    <span>Timeless Piece</span>
                </div>
            </div>
        </div>
    </div>
    <!--KF MAGZINE ADD END-->
    
    <!--KF MAGZINE LIST START-->
    <div class="kf_magazine_list">
        <!--CONTAINER START-->
        <div class="container">
            <div class="col-md-9 responsive_padding">
                <!--KF MAGZINE ROW START-->
                <div class="kf_magazine_row">
                    <div class="kf_top_story">
                        <div class="section_heading">
                            <h2>Top Posts</h2>
                            <span></span>
                        </div>
                    </div>
                    <div class="row">
                        @if(!empty($opindex->title))
                        <div class="col-md-8">
                            <div class="kf_blog_medium">
                                <figure class="overlay">
                                <img src="{{asset('images/post/'.$Helper->postImageFirst($opindex->id)->name)}}" 
                                alt="post image" style="max-height:500px;">
                                    <a class="bf_busines theam_btn_medium" href="{{ url('category/'.$opindex->category.'/index')}}">{{$opindex->category}}</a>
                                    <ul class="bit_meta meta_2 meta_3">
                                        <li><a href="{{ url(str_slug(strtolower($opindex->category), '-').'/'.$opindex->id.'/'.str_slug(strtolower($opindex->title), '-')) }}"><i class="fa fa-user"></i>{{$opindex->guest_name}}</a></li>
                                        <li><a href="{{ url(str_slug(strtolower($opindex->category), '-').'/'.$opindex->id.'/'.str_slug(strtolower($opindex->title), '-')) }}"><i class="fa fa-calendar-check-o"></i>{{$opindex->created_at->diffForHumans()}}</a></li>
                                      
                                    </ul>
                                </figure>
                                <div class="kf_blog_text">
                                    <h4><a href="{{ url(str_slug(strtolower($opindex->category), '-').'/'.$opindex->id.'/'.str_slug(strtolower($opindex->title), '-')) }}">{{$Helper->get_title(title_case(strtolower($opindex->title)), 30)}}</a></h4>
                                    <p>{{strip_tags(htmlspecialchars_decode(ucfirst($Helper->get_words($opindex->post, 40))))}}.</p>	
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-md-4">
                            <div class="kf_blog_list">
                                <ul>
                                 @if(!empty($morelatest))
                                 @foreach($morelatest as $latest)
                                    <li>
                                        <div class="kf_blog_modren">
                                            <figure class="overlay">
                                                <img src="{{asset('images/post/'.$Helper->postImageFirst($latest->id)->name)}}" alt="post image" style="max-height: 105px; max-width:100px;">
                                            </figure>
                                            <div class="kf_blog_modren_text">
                                                <h6 style="font-size:1em;"><a  href="{{ url(str_slug(strtolower($latest->category), '-').'/'.$latest->id.'/'.str_slug(strtolower($latest->title), '-')) }}">
                                                {{$Helper->get_title(title_case(strtolower($latest->title)), 16)}}
                                                </a></h6>
                                                <!--<ul class="bit_meta meta_2 meta_4">
                                                    <li><a href="#"><i class="fa fa-calendar-check-o"></i>John Throat</a></li>
                                                    <li><a href="#"><i class="fa fa-comments"></i>3 Months</a></li>
                                                </ul>-->
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>	
                <!--KF MAGZINE ROW END-->
                
                <!--KF MAGZAINE ROW START-->
                <div class="kf_magazine_row">
                    <div class="kf_top_story">
                        <div class="section_heading">
                            <h2>Small Business</h2>
                            <span></span>
                        </div>
                    </div>
                    <div class="row">
                        @if(!empty($businesspost))
                        @foreach($businesspost as $bpost)
                        <div class="col-md-4 col-sm-6">
                            <div class="kf_blog_medium grid">
                                <figure>
                                    <img src="{{asset('images/post/'.$Helper->postImageFirst($bpost->id)->name)}}" alt="post image"
                                     style="height:230px; max-width:250px;">
                                </figure>
                                <div class="kf_blog_text">
                                    <h6><a href="{{ url(str_slug(strtolower($bpost->category), '-').'/'.$bpost->id.'/'.str_slug(strtolower($bpost->title), '-')) }}">
                                      {{$Helper->get_title(title_case(strtolower($bpost->title)), 20)}}</a></h6>
                                    	
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    </div>
                    
                    <!--<div class="kf_banner_add add_2 overlay">
                        <div class="kf_add_text">
                            <h5>Best Business,<br>News Magazine</h5>
                        </div>
                        <div class="kf_add_content">
                            <h3>The Home to your</h3>
                            <span>Timeless Piece</span>
                        </div>
                    </div>-->
                </div>
                <!--KF MAGZAINE ROW END-->						
            </div>
            
            <div class="col-md-3 responsive_padding">
                <!--SIDE BAR WRAP START-->
                <div class="side_bar_wrap">
                    <!--KF SOCIAL LIST START-->


                    <!--KF SOCIAL LIST END-->
                    
                    <!--KF ADD LOGO START-->
                    <!--<div class="kf_add_logo">
                        <a href="#"><img src="{{ asset('images/add-logo.png') }}" alt=""></a>
                        <h5>Wordpress Business Blog Newspaper Theme</h5>
                        <a class="arrow_down" href="#">
                            <img src="{{ asset('images/arrow.png')}}" alt=""></a>
                        <div class="full_width">
                            <a class="theam_btn_medium" href="#">Get It Now!</a>
                        </div>
                    </div>-->
                    <!--KF ADD LOGO END-->
                    
                    <!--KF SIDE TABS START-->
                    <div class="kf_side_tabs">
                        <div class="panel panel-default">
                            <ul class="kf_tabs_list nav-tabs">
                               
                             <li>
                             <a href="#tab1" data-toggle="tab">Popular</a>
                                </li>
                            </ul>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab">
                                        @if(!empty($popularpost))
                                        @foreach($popularpost as $popular)
                                        <div class="kf_tabs_des">
                                            <figure class="overlay"> 
                                                <img src="{{asset('images/post/'.$Helper->postImageFirst($popular->id)->name)}}" alt="" style="max-height:180px; max-width:200px;"/>
                                            </figure>
                                            <div class="kf_tabs_text">
                                                <a href="{{ url(str_slug(strtolower($popular->category), '-').'/'.$popular->id.'/'.str_slug(strtolower($popular->title), '-')) }}"> </a>
                                                <h6>{{$Helper->get_title(title_case(strtolower($popular->title)), 15)}}</h6>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                    </div>
                                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--KF SIDE TABS END-->
                </div>
                <!--SIDE BAR WRAP END-->
            </div>
        </div>
        <!--CONTAINER END-->
    </div>
    <!--KF MAGZINE LIST END-->
    @endsection



    