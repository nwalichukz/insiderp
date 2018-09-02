@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
<div class="container">
      @if(empty($title))
    <div class="col-md-6">
    <form method="POST" action="{{url('/post-search')}}"> 
         {{ csrf_field() }}
      <div class="form-group">
     <div class="searchinputwrapper">
     <input onkeyup="autocomplet()" type="text" name="name" id="search" class="name" placeholder="Find any news or articles" value="{{old('name')}}" autofocus> 
     <div id="content" class="col-md-12"> </div>
     <button type="submit" class="searchbtn" id="btnsearch">
   <span class="glyphicon glyphicon-search"> </span>
    </button>
    </div>
</div>
    </form>
    </div>
    @endif
<div class="col-md-6 col-lg-6 panel" id="centerDiv">
	     <!-- Ya just loop it here -->
            <div id="mainContent">

      <!-- yes oh here start loop -->
      @if($trending->count() > 0)
      @foreach($trending as $trend)
                <div class="col-md-10 col-lg-10 avatarwrapper">
                   <div class="media-left">
                            <div class="figure-block">
                                <figure class="item-thumb">
                                    <a href="{{ url('/post/'.$Helper->user($trend->user_id)->user_name) }}" title="The user name and the page this posted">
                                    @if(!empty($Helper->postAvatar($trend->user_id)->name))
                                   <img src="{{asset("images/user/".$Helper->postAvatar($trend->user_id)->name)}}" class="img-circle imgcircle" alt="thumb">
                                   @else
                                    <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                                   @endif
                                    <span >{{ucfirst(strtolower($Helper->user($trend->user_id)->user_name))}}</span> /<span style="color:#FF8C00;">{{$trend->category}} </span>
                                    </a>
                                </figure>
                            <p> <span class="time-right time-date-fullview">{{date('d F \'y \a\t h:i:a', strtotime($trend->created_at))}}</span></p>
                            </div>
                        </div>
                        @if(Auth::check() && (Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor'))
                        @if($trend->status ==='active')
                       <a href="{{url('/block-post/'.$trend->id) }}"> <i title="Block this post" class="time-date trash glyphicon glyphicon-ban-circle pull-right"> </i> </a>
                       @else
                       <a href="{{url('/unblock-post/'.$trend->id)}}"> <i title="unblock this post" class="time-date trash glyphicon glyphicon-trash pull-right"> </i> </a>
                       @endif
                        @endif
                      @if((Auth::check() && (Auth::user()->id === $trend->user_id)) || (Auth::check() && (Auth::user()->user_level === 'admin')))
                       <a href="{{url('/delete-post/'.$trend->id) }}" class="time-date pull-right trash"> X </a>
                      <a href="{{url('/edit-post/'.$trend->id)}}">
                      <i title="Edit this post" class="edit glyphicon glyphicon-edit pull-right"> </i>
                      </a>
                        @endif
                     </div>

                    <div class="container1 col-md-11 panel">
                      @if(!empty($Helper->postImage($trend->id)->name))
                      <div style="float:left; padding:0;" class="col-md-4" >
                      <img src="{{asset("images/post/".$Helper->postImage($trend->id)->name)}}" style="width:100%; height:180px;">
                     </div>
                     <div style="padding:0 0 0 10px;" class="col-md-8">      
                     <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_slug(strtolower($trend->title), '-')) }}"> <h4>{{title_case($Helper->get_title($trend->title, 10))}} </h4> </a>
                  <p style="font-size:1.2em;">
                    {!!ucfirst($Helper->get_words($trend->post, 23))!!} <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_slug(strtolower($trend->title), '-')) }}" title="click to read full details"> more </a>
                     </p>
                 
                  </div>
                  @else  
              <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_slug(strtolower($trend->title), '-')) }}"> <h4>{{title_case($Helper->get_title($trend->title, 10))}} </h4> </a> 
              <p style="font-size:1.2em;">
                    {!!ucfirst($Helper->get_words($trend->post, 23))!!} <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_slug(strtolower($trend->title), '-')) }}" title="click to read full details"> more </a>
                     </p>
                  @endif
                </div>
                <div style="margin-bottom:8px;" class="col-md-10 col-lg-10" id="postBox">
                <span class="glyphicon glyphicon-thumbs-up col-md-3" title="Total number likes for this post" aria-hidden="true"><i class="likedata"> {{$Helper->getLikes($trend->id)}}</i> </span>
                <span class="col-md-3" title="Total number of times this post is viewed" aria-hidden="true">
                  <i class="likedata time-date">
                  @if(!empty($Helper->postView($trend->id)->view))
                  {{$Helper->postView($trend->id)->view}} views @endif
                </i>
                  </span>
                <a href="{{url("post-like/".$trend->user_id.'/'.$trend->id)}}" >
                <span class="like glyphicon glyphicon-thumbs-up col-md-3" title="Like this post" aria-hidden="true"><i class="likedata time-date" onclick="postLike(event);" id="{{$trend->id}}"> Like</i></span> 
              </a>
                  <span class="pull-right time-date" title="Total number of comments for this post">
                    @if($Helper->commentCount($trend->id) > 1)
                  {{ $Helper->commentCount($trend->id) }} comments
                  @elseif($Helper->commentCount($trend->id) == 1)
                  {{$Helper->commentCount($trend->id) }} comment
                  @elseif($Helper->commentCount($trend->id) > 5)
                  $comment = $Helper->commentCount($trend->id)/2
                  {{$comment}} k comments
                  @else
                  {{$Helper->commentCount($trend->id)}} comments
                  @endif
                </span>
                </div>

                <!--- comment box -->
                @if(!empty($Helper->comment($trend->id)))
                <div id="commentBox">
                @foreach($Helper->comment($trend->id) as $comment)
                <div class= "col-md-12" >
                <div class="col-md-1">
                   <a href="{{ url('#') }}">
                @if(!empty($Helper->commenterAvatar($comment->user_id)->name))
                  <img src="{{asset("images/user/".$Helper->commenterAvatar($comment->user_id)->name)}}" class="img-circle imgcircle" alt="thumb">
                  @else
                   <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                  @endif
                  </a>
                </div>
                 <div class="col-md-9">
                  <p style="font-size:1em;" class="container2 ">
                    <a href="#"><span>{{ucfirst(strtolower($Helper->commenter($comment->user_id)->user_name))}}</span></a> 
                {{ucfirst($comment->comment)}}

                     </p>
                     <span class="time-date pull-right">{{date('d F \'y \a\t h:i:a', strtotime($trend->created_at))}} </span>
                </div>
                <div>
                 <div class="col-md-12" id="likeBox">
                <i class="col-md-2" ></i>
                <a href='{{url("comment-like/".$comment->id)}}'> 
                <span class="col-md-3 likedata commentlike" title="Like this comment, total number likes for this comment" aria-hidden="true">
                <i class="likedata time-date" id="{{$comment->id}}">{{$Helper->commentLike($comment->id)}} Like</i> </span>
              </a>
               
                 @if(Auth::check() && (Auth::user()->id === $comment->user_id))
                 <a href="{{url('/delete-comment/'.$comment->id)}}"> <i class="col-md-1 glyphicon glyphicon-trash time-date" aria-hidden="true"></i> </a>
                  @endif
              </div>
                </div>
              </div>
              @endforeach
            </div>
              @endif
  
              <!--- comment form -->
              @if(Auth::check())
              <div class="col-md-12 commentform">
                 <div class="col-md-1 commentimg">
                 <a href="{{ url('#') }}">
                  @if(!empty($Helper->postAvatar(Auth::user()->id)->name))
                  <img src="{{asset("images/user/".$Helper->postAvatar(Auth::user()->id)->name)}}" class="img-circle imgcircle" alt="user image">
                  @else
                  <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="avatar image">
                  @endif
                </a>
                </div>
                <div clas="col-md-10 col-lg-10">             
                <form id="commentForm" name="commentForm" action="{{url('/post-comment')}}" method="post">
                   {{ csrf_field() }}
                  <input type="hidden" id="postid" name="post_id" value="{{$trend->id}}">
                 <div class="col-sm-9">
                    <div class="form-group">
                        <textarea name="comment" id="commentarea" style="border-radius:25px;" class="form-control" rows="1" autofocus="true" value="{{ old('description') }}" placeholder="Leave a comment" required></textarea>
                    </div>
                    <button type="submit" class="pull-right btn"><i class="glyphicon glyphicon-send"></i></button>
                    @if($Helper->commentCount($trend->id) > 2)
                    <a href="">View more Comments </a>
                    @endif
                </div>
                 </form>
            </div>
        </div>
        @endif
         <!---yes stop loop here  -->
         @endforeach
          @if(!Auth::check())
        <div class="col-md-6 col-lg-6">
         <p><a href="#" data-toggle="modal" data-target="#loginModalAny" data-placement="top"> Login </a> or
          <a href="#"data-toggle="modal" data-target="#signupModalAny" data-placement="top" data-toggle="modal" data-target="#addPostModal" data-placement="top"> register</a> to like or comment on any post </p>
        </div>
        @endif
          @else
      
          <div class="col-md-12">
            <p syle="font-size:1.3em;">No posts for this page yet please try another page.</p>
             </div>
          @endif
          </div>
          
          </div> 
</div>
</div>
@endsection