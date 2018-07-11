@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
<div class="container">
<div class="col-md-7 col-lg-7 panel" id="centerDiv">
	    <div class="item-wrap">
      <!-- yes oh here start loop -->
      @foreach($trending as $trend)
                <div class="col-md-10 col-lg-10 avatarwrapper">
                   <div class="media-left">
                            <div class="figure-block">
                                <figure class="item-thumb">
                                    <a href="{{ url('/post-full-view/'.$trend->id) }}" title="The user name and the page this posted">
                                    @if(!empty($Helper->postAvatar($trend->user_id)->name))
                                   <img src="{{asset("images/user/".$Helper->postAvatar($trend->user_id)->name)}}" class="img-circle imgcircle" alt="thumb">
                                   @else
                                    <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                                   @endif
                                    <span class=""><span style=";">{{ucfirst(strtolower($Helper->user($trend->user_id)->user_name))}}</span> /<span style="color:#FF8C00;">{{$trend->category}} </span>
                                    </a>
                                </figure>
                            </div>
                        </div>
                         @if(Auth::check() && (Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor'))
                        @if($trend->status ==='active')
                       <a href="{{url('/block-post/'.$trend->id)}}"> <i id="{{$trend->id}}" title="Block this post" class="trash glyphicon glyphicon-trash pull-right"> </i> </a>
                       @else
                       <a href="{{url('/unblock-post/'.$trend->id)}}"> <i id="{{$trend->id}}" title="unblock this post" class="trash glyphicon glyphicon-trash pull-right"> </i> </a>
                       @endif
                        <a href="#"> <i title="Edit this post" class="edit glyphicon glyphicon-edit pull-right"> </i> </a>
                        @endif
                     </div>

                    <div style="color:;" class="container1 col-md-10 col-lg-12 panel">
                      @if(!empty($Helper->postImage($trend->id)->name))
                      <div style="border:1px solid #fff;" class="col-md-3 col-lg-4" style="width:100px; float:left; height:200px; margin:0 5px 0 5px;">
                      <img src="{{asset("images/post/".$Helper->postImage($trend->id)->name)}}" style="width:100%; height:180px;" alt="">
                     </div>
                     <div style="border:1px solid #fff;" class="col-md-9 col-lg-8">
                  <div class="media-body media-midd">
                    <div class="my-description">
                  <p style="font-size:1.2em; text-align:justify; color:;">
                    {{$Helper->get_words($trend->post)}}
                     </p>
                     
                      <span class="time-right">{{date('d F \'y \a\t h:i', strtotime($trend->created_at))}}</span>
                    </div>
                  </div>
                  </div>
                  @else
                  <div class="media-body media-middle">
                    <div class="my-description">
                  <p style="font-size:1.2em; text-align:justify; color:;">
                    {{$Helper->get_words($trend->post)}}
                     </p>
                     
                      <span class="time-right">{{date('d F \'y \a\t h:i', strtotime($trend->created_at))}}</span>
                    </div>
                  </div>
                  @endif
                </div>
                <div style="margin-bottom:8px;" class="col-md-10 col-lg-10" id="postBox">
                <span class="glyphicon glyphicon-thumbs-up col-md-3" title="Total number likes for this post" aria-hidden="true"><i class="likedata"> {{$trend->rank}}</i> </span>
                <span class="glyphicon glyphicon-eye col-md-3" title="Total number of times this post is viewed" aria-hidden="true"><i class="likedata">
                  @if(!empty($Helper->postView($trend->id)->view))
                  {{$Helper->postView($trend->id)->view}} @endif
                  <i class="likedata glyphicon glyphicon-record"></i></i> </span>
                <a href="{{url("post-like/".$trend->user_id.'/'.$trend->id)}}" >
                <span class="like glyphicon glyphicon-thumbs-up col-md-3" title="Like this post" aria-hidden="true"><i class="likedata" onclick="postLike(event);" id="{{$trend->id}}"> Like</i></span> 
              </a>
                  <span class="pull-right" title="Total number of comments for this post">
                    @if($Helper->commentCount($trend->id) > 1)
                  {{ $Helper->commentCount($trend->id) }} comments
                  @else
                  {{$Helper->commentCount($trend->id) }} comment
                  @endif</span>
                </div>

                <!--- comment box -->
                @if(!empty($Helper->comment($trend->id)))
                @foreach($Helper->comment($trend->id) as $comment)
                <div class= "col-md-12" id="commentBox">
                <div class="col-md-1">
                   <a href="{{ url('#') }}">
                @if(!empty($Helper->commenterAvatar($comment->user_id)->name))
                  <img src="{{asset("images/user/".$Helper->commenterAvatar($comment->user_id)->name)}}" style="width:40px; height:40px;" class="img-circle imgcircle" alt="thumb">
                  @else
                   <img src='{{asset("images/avatar/avatar.png")}}' style="width:40px; height:40px;" class="img-circle imgcircle" alt="thumb">
                  @endif
                  </a>
                </div>
                 <div style="padding:;" class="container2 col-md-9 col-lg-9">
                  <div class="media-body media-middle">
                    <div class="my-description">
                  <p style="font-size:1.3em; text-align:justify; color:#000;">
                    <a href="#"><span>{{ucfirst(strtolower($Helper->commenter($comment->user_id)->user_name))}}</span></a> 
                {{ucfirst($comment->comment)}}
                     </p>
                    </div>
                  </div>
                </div>
                <div>

                <div class="col-md-12 col-lg-12" id="likeBox">
                <i class="col-md-1" ></i> 
                <span class="glyphicon glyphicon-thumbs-up col-md-2 likedata time-date commentlike" title="Total number likes for this comment" aria-hidden="true">
                <i class="likedata" id="{{$comment->id}}">Like</i> </span>
                <i class="col-md-2 time-date" title="The time this comment was posted">{{date('j/n \'y', strtotime($comment->created_at))}} </i> 
              @if(Auth::check() && (Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor'))
                <span class="col-md-2 col-sm-2 col-xs-3">
                  @if($trend->status ==='active')
                <a href="{{url('/block-comment/'.$comment->id)}}"> <i id="{{$comment->id}}" title="block this comment" class="glyphicon glyphicon-trash time-date"> </i> </a>
                 @else
                <a href="{{url('/unblock-comment/'.$comment->id)}}"> <i id="{{$comment->id}}" title="unblock this comment" class="glyphicon glyphicon-trash time-date"> </i> </a>
                 @endif
                 <a href="{{url('/unblock-comment/'.$comment->id)}}"> <i title="Edit this comment" class="glyphicon glyphicon-edit time-date"> </i> </a>
             </span>
             <i class="col-md-2 glyphicon glyphicon-thumbs-up" aria-hidden="true"> </i>
              </div>
             @endif

                </div>
              </div>
   
              @endforeach
              @endif
  
              <!--- comment form -->
              @if(Auth::check())
              <div class="col-md-12 commentform">
                 <div class="col-md-1 commentimg">
                 <a href="{{ url('#') }}">
                  @if(!empty($Helper->postAvatar(Auth::user()->id)->name))
                  <img src="{{asset("images/user/".$Helper->postAvatar(Auth::user()->id)->name)}}" class="img-circle imgcircle" alt="thumb">
                  @else
                  <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                  @endif
                </a>
                </div>
                <div clas="col-md-10 col-lg-10">             
                <form id="commentForm" name="commentForm" onsubmit="postComment(event);" action="{{url('/post-comment')}}" method="post">
                   {{ csrf_field() }}
                  <input type="hidden" id="postid" name="post_id" value="{{$trend->id}}">
                 <div class="col-sm-9">
                    <div class="form-group">
                        <textarea name="comment" id="commentarea" style="border-radius:25px;" class="form-control" rows="1" autofocus="true" value="{{ old('description') }}" placeholder="write a comment" required></textarea>
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
        <div class="col-md-12">
         <p><a href="#" data-toggle="modal" data-target="#loginModalAny" data-placement="top"> Login </a> or
          <a href="#"data-toggle="modal" data-target="#signupModalAny" data-placement="top" data-toggle="modal" data-target="#addPostModal" data-placement="top"> register</a> to like or comment on any post </p>
        </div>
        @endif
        </div> 
</div>
</div>
@endsection