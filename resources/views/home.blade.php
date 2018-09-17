@inject('Helper', 'App\HelperClass')
@extends('layouts.indextemplate')
@section('content')
    <div class="mt-11">
        <div class="container mx-auto md:flex md:items-start p-3">
            <div class="w-full md:w-1/4 mb-2">
                <div class="bg-white rounded px-4 py-4 mb-4">
                    <div class="lead-post bg-grey-lighter py-3 mb-3">
                        <p class="text-xl underline text-left px-4">Lead Post</p>
                        <div class="trending py-3 px-4">
                            @if(!empty($lead->title))
                                @if(!empty($Helper->postImage($lead->id)->name))
                                    <img src="{{asset("images/post/".$Helper->postImage($lead->id)->name)}}" alt="post Image" class="mb-3">

<<<<<<< HEAD
                                    <a href="{{ url('/post-full-view/'.$lead->id.'/'.str_slug(strtolower($lead->title), '-')) }}" class="text-lg text-blue hover:underline hover:text-blue-dark">{{$Helper->get_title(ucfirst(strtolower($lead->title)), 10)}}</a>
                                @endif
                            @endif
                        </div>
                    </div>
=======
                    <div class="container1 col-md-12 post-text" style="padding:0 0px 0 0;">
                    
                      @if(!empty($Helper->postImage($trend->id)->name))
                      <a href="{{url('/post-full-view/'.$trend->id.'/'.str_slug(strtolower($trend->title), '-'))}}"><h4>{{title_case(strtolower($Helper->get_title($trend->title, 12)))}}</h4></a>
                      <div class="col-md-12" style="float:left; padding:0; width:100%;">
                      <img src="{{asset("images/post/".$Helper->postImage($trend->id)->name)}}" style="width:100%; max-height:300px;">
                     </div>
                     <div class="col-md-12" style="padding:0 0 0 7px;">
                   
                    {!!ucfirst($Helper->get_words($trend->post, 35))!!}  <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_slug(strtolower($trend->title), '-')) }}" title="click to read full details"> more </a>  
                     
                  </div>
                  @else
                  <a href='{{ url("/post-full-view/".$trend->id."/".str_slug(strtolower($trend->title), '-')) }}'> <h4> {{title_case($Helper->get_title($trend->title, 12))}} </h4> </a>
                    {!!ucfirst($Helper->get_words($trend->post, 32))!!}  <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_slug(strtolower($trend->title), '-')) }}" title="click to read full details"> more </a> 
                    @endif
                </div>

                <div style="margin-bottom:8px;" class="col-md-10 col-lg-10" id="postBox">
                <span class="glyphicon glyphicon-thumbs-up col-md-3" title="Total number likes for this post" aria-hidden="true"><i class="likedata"> {{$Helper->getLikes($trend->id)}}</i> </span>
                <span class="col-md-3" title="Total number of times this post is viewed" aria-hidden="true">
                  <i class="likedata time-date">
                  @if(!empty($Helper->postView($trend->id)->view))
                  @if($Helper->postView($trend->id)->view > 1)
                  {{$Helper->postView($trend->id)->view}} views 
                  @else
                  {{$Helper->postView($trend->id)->view}} view
                  @endif
                  @endif
                </i>
                  </span>
                  @if(Auth::check())
                <a href="{{url("post-like/".$trend->user_id.'/'.$trend->id)}}" >
                <span class="like glyphicon glyphicon-thumbs-up col-md-3" title="Like this post" aria-hidden="true">
                  <i class="likedata time-date" onclick="postLike(event);" id="{{$trend->id}}"> Like</i></span> 
              </a>
              @endif
                  <span class="pull-right time-date" title="Total number of comments for this post">
                    @if($Helper->commentCount($trend->id) > 1)
                  {{ $Helper->commentCount($trend->id) }} comments
                  @else
                  {{$Helper->commentCount($trend->id) }} comment
                  @endif
                </span>
                </div>
                <!--- comment box -->
                @if(!empty($Helper->comment($trend->id)))
                @foreach($Helper->comment($trend->id) as $comment)
                <div id="commentBox">
                <div class= "col-md-12" >
                <div class="col-md-1">
                   <a href="#">
                @if(!empty($Helper->commenterAvatar($comment->user_id)->name))
                  <img src="{{asset("images/user/".$Helper->commenterAvatar($comment->user_id)->name)}}" class="img-circle imgcircle" alt="thumb">
                  @else
                   <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                  @endif
                  </a>
>>>>>>> 40c91d2a48c9ad83455e3aabec1607bcf806e155
                </div>

                @if(!empty($trendpost))
                    <div class="bg-white rounded px-4 py-4 mb-4">
                        <div class="trending-posts bg-grey-lighter py-3 mb-4">
                            <p class="text-xl underline text-left px-4">Trending Posts</p>
                            <div class="post py-3 px-4 text-lg">
                                @foreach($trendpost as $post)
                                    <p class="mb-2"><a href="{{ url('/post-full-view/'.$post->id.'/'.str_slug(strtolower($post->title), '-')) }}">{{$Helper->get_title(ucfirst(strtolower($post->title)), 13)}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="w-full md:w-2/5 md:mx-4">
                @if(empty($title))
                    @include('partials.search-bar')
                @endif
                @if($posts->count() > 0)
                    @include('partials.post-item')
                @else
                <div class="bg-white text-center rounded py-3 px-4">Ahhh!... No posts yet</div>
                @endif

            </div>
            <div class="w-full md:w-1/4">
                <div class="bg-white py-3 px-4">
                    <div class="mb-2 text-lg">Bido Pages</div>
                    <div class="border-b mb-2"></div>

                    <div class="bd-links px-3">
                        <ul class="list-reset flex flex-wrap">
                            @foreach($cat as $category)
                            <li class="mb-1 mr-1"><a href="{{url("/page/".$category->name)}}" class="text-base text-blue-light hover:text-blue-dark mb-2">{{$category->name}}, </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection