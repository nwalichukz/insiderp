@inject('Helper', 'App\HelperClass')
@extends('layouts.indextemplate')
@section('content')
<div class="container">
       <div class="col-md-3 con">
               <h4 class="titles"> Related Posts </h4>
            <hr/>

      <a href="" class="time-date"> </a>
     
     
      <img src="" style="width:100%; height:150px;">
    
    

    <A href="#"> <h4> </h4> </a>
     </div>
<div class="col-md-6 panel" id="centerDiv">
     
            <!-- yes oh here start loop -->
                <div class="col-md-10 col-lg-10 avatarwrapper">
                   <div class="media-left">
                            <div class="figure-block">
                                <figure class="item-thumb">
                                    <a href="{{ url('#') }}" title="The user name and the page this  post was posted to">
                                    @if(!empty($Helper->postAvatar($trend->user_id)->name))
                                   <img src="{{asset("images/user/".$Helper->postAvatar($trend->user_id)->name)}}" class="img-circle imgcircle" alt="thumb"/>
                                   @else
                                    <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb"/>
                                   @endif
                                    <span>{{$Helper->user($trend->user_id)->user_name}}</span><span style="color:#FF8C00;">{{$trend->category}} </span>
                                    </a>
                                </figure>
                            </div>
                        </div>
                     </div>

                    <div class="container1 col-md-10 col-lg-12">
                      @if(!empty($Helper->postImage($trend->id)->name))
                      <div style="border:1px solid #fff;" class="col-md-3 col-lg-4" style="width:100px; float:left; height:200px; margin:0 5px 0 5px;">
                      <img src="{{asset("images/post/".$Helper->postImage($trend->id)->name)}}" style="width:100%; height:180px;" />
                     </div>
                     <div style="border:1px solid #fff;" class="col-md-9">
                      @if(!empty($trend->title))
                     <a href="{{ url('/post-full-view/'.$trend->id) }}"> <h4>{{$Helper->get_title($trend->title, 10)}} </h4> </a>
                     @else
                      <a href="{{ url('/post-full-view/'.$trend->id) }}"> <h4>{{$Helper->get_title($trend->post, 10)}} </h4> </a>
                     @endif                
                  <p style="font-size:1.2em;">
                    {{$trend->post}}
                     </p>
                      <span class="time-right">{{date('d F, Y', strtotime($trend->created_at))}}</span>
                
                  </div>
                  @else
                   @if(!empty($trend->title))
                     <a href="{{ url('/post-full-view/'.$trend->id) }}"> <h4>{{$Helper->get_title($trend->title, 10)}} </h4> </a>
                     @else
                      <a href="{{ url('/post-full-view/'.$trend->id) }}"> <h4>{{$Helper->get_title($trend->post, 10)}} </h4> </a>
                     @endif                  
                  <p style="font-size:1.2em;">
                    {{$trend->post}}
                     </p>
                     
                      <span class="time-right">{{ $trend->created_at->diffForHumans()}}</span>
          
                  @endif
                </div>
                <div style="margin-bottom:8px;" class="col-md-10" id="likeBox">
                <span class="glyphicon glyphicon-thumbs-up col-md-3" title="Total number likes for this post" aria-hidden="true"><i class="likedata"> {{$trend->rank}}</i> </span>
                <span class="glyphicon glyphicon-eye col-md-3" title="Total number of times this post is viewed" aria-hidden="true"><i class="likedata"> 
                  @if(!empty($Helper->postView($trend->id)->view))
                  {{$Helper->postView($trend->id)->view}} @endif
                  <i class="likedata glyphicon glyphicon-record"></i></i> </span>
                <a href="{{url("post-like/".$trend->user_id.'/'.$trend->id)}}">
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
                <div id="commentID">
                @if(!empty($Helper->commentAll($trend->id)))
                @foreach($Helper->commentAll($trend->id) as $comment)
                <div class= "col-md-12" id="commentBox">
                <div class="col-md-1">
                   <a href="{{ url('#') }}">
                @if(!empty($Helper->commenterAvatar($comment->user_id)->name))
                  <img src="{{asset("images/user/".$Helper->commenterAvatar($comment->user_id)->name)}}" class="img-circle imgcircle" alt="thumb">
                  @else
                   <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                  @endif
                  </a>
                </div>
                 <div class="container2 col-md-9">
                  <div class="media-body media-middle">
                    <div class="my-description">
                  <p style="font-size:1.2em;">
                    <a href="#"><span>{{$Helper->commenter($comment->user_id)->user_name}}</span></a> 
                {{ucfirst($comment->comment)}}
                     </p>
        
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                <div class="col-md-4"></div> 
                <span class="glyphicon glyphicon-thumbs-up col-md-3 likedata commentlike" title="Total number likes for this comment" aria-hidden="true">
                <i class="likedata">Like</i> </span>
                <i class="col-md-2" title="The time this comment was posted">{{date('j/n \'y', strtotime($comment->created_at))}} </i> 
                <div class="col-md-1">
                
             </div>
                </div>
              </div>
              @endforeach
              @endif
            </div>

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
                <form id="commentForm" name="commentForm" onsubmit="postComment(event);" action="#" method="post">
                   {{ csrf_field() }}
                  <input type="hidden" name="post_id" id="postid" value="{{$trend->id}}">
                 <div class="col-sm-9">
                    <div class="form-group">
                        <textarea name="comment" id="commentarea" style="border-radius:25px;" class="form-control" rows="1" autofocus="true" value="{{ old('description') }}" placeholder="write a comment" required></textarea>
                    </div>
                    <button type="submit" class="pull-right btn"><i class="glyphicon glyphicon-send"></i></button>
                </div>
                 </form>
            </div>
        </div>
        @else
  
        <div class="col-md-9 center-block logincomment">
         <p>  </br><a href="#" data-toggle="modal" data-target="#loginModalAny" data-placement="top"> Login </a> or
          <a href="#"data-toggle="modal" data-target="#signupModalAny" data-placement="top" data-toggle="modal" data-target="#addPostModal" data-placement="top"> register</a> to like or comment on any post </p>
        </div>

        @endif
         <div class="col-md-12 col-lg-12 center-block>" >
            <p class="paginateText">{{ $Helper->commentAll($trend->id)->links() }}</p>
        </div>
         <!---yes stop loop here  -->
       </dv>
</div>
</div> 
</div>
@endsection