@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
<div class="col-md-5 panel" id="centerDiv">
		<div class="item-wrap">
			<!-- yes oh here start loop -->
      @if($trending->count() > 0)
			@foreach($trending as $trend)
              	<div class="col-md-10">
              		 
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
                          
        
                       <a href="{{url('/delete-post/'.$trend->id)}}"> <i title="Delete this post" class="trash glyphicon glyphicon-trash pull-right"> </i> </a>
                        <a href="{{url('/edit-post/'.$trend->id)}}"> <i title="Edit this post" class="edit glyphicon glyphicon-edit pull-right"> </i> </a>

                     </div>
                    <div class="container1 col-md-10 col-lg-12 panel">
                    	@if(!empty($Helper->postImage($trend->id)->name))
                    	<div style="border:1px solid #fff;" class="col-md-3 col-lg-4" style="width:100px; float:left; height:1780px; margin:0 5px 0 5px;">
              			 	<img src="{{asset("images/post/".$Helper->postImage($trend->id)->name)}}" style="width:100%; height:200px;" alt="">
              			 </div>
              			 <div style="border:1px solid #fff;" class="col-md-9 col-lg-8">
              		
                       @if(!empty($trend->title))
                     <a href="{{ url('/post-full-view/'.$trend->id) }}"> <h4>{{$Helper->get_title($trend->title, 10)}} </h4> </a>
                     @else
                      <a href="{{ url('/post-full-view/'.$trend->id) }}"> <h4>{{$Helper->get_title($trend->post, 10)}} </h4> </a>
                     @endif
              		<p style="font-size:1.2em;">
              			{{$Helper->get_words($trend->post, 23)}}
              			 </p>
              			 
              			 	<span class="time-right">{{date('d F \'y \a\t h:i', strtotime($trend->created_at))}}</span>
              		       @if($trend->post_importance==='votes')
                    <a href="{{url('/add-option/'.$trend->id)}}">
                     <i title="Add option to this post" class="time-date">add option </i> </a>
                   @endif
              		</div>
              		@else
              		
                       @if(!empty($trend->title))
                     <a href="{{ url('/post-full-view/'.$trend->id) }}"> <h4>{{$Helper->get_title($trend->title, 10)}} </h4> </a>
                     @else
                      <a href="{{ url('/post-full-view/'.$trend->id) }}"> <h4>{{$Helper->get_title($trend->post, 10)}} </h4> </a>
                     @endif
              		<p style="font-size:1.2em;">
              			{{$Helper->get_words($trend->post, 23)}} 
              			 </p>
              			 
              			 	<span class="time-right">{{date('d F \'y \a\t h:i', strtotime($trend->created_at))}}</span>
                         @if($trend->post_importance==='votes')
                    <a href="{{url('/add-option/'.$trend->id)}}">
                     <i title="Add option to this post" class="time-date">add option </i> </a>
                   @endif
              		
              		@endif
              	</div>
              	 <div style="margin-bottom:8px;" class="col-md-10 col-lg-10" id="postBox">
                <span class="glyphicon glyphicon-thumbs-up col-md-3" title="Total number likes for this post" aria-hidden="true"><i class="likedata"> {{$Helper->getLikes($trend->id)}}</i> </span>
                <span class="glyphicon glyphicon-eye col-md-3" title="Total number of times this post is viewed" aria-hidden="true"><i class="likedata">
                  @if(!empty($Helper->postView($trend->id)->view))
                  {{$Helper->postView($trend->id)->view}} views @endif</span>
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
                <!--vote form -->
                <div class="col-md-12 votediv">
                  @if($Helper->getOption($trend->id)->count() > 0)
                  @foreach($Helper->getOption($trend->id) as $option)
                  <div class="col-md-3 option">
                    {{$option->name}} <br/>
                    <a href="#" class="badge" title="{{$option->sescription}}">vote </a>
                  </div>
                  @endforeach
                  @endif
                </div>

              	<!--- comment box -->
              	  @if(!empty($Helper->comment($trend->id)))
                @foreach($Helper->comment($trend->id) as $comment)
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
              		<p style="font-size:1.3em;">
              			<a href="#"><span>{{ucfirst(strtolower($Helper->commenter($comment->user_id)->user_name))}}</span></a> 
          			   {{ucfirst($comment->comment)}}
              			 </p>
              	</div>
              	<div>
                  <div class="col-md-12" id="likeBox">
                <i class="col-md-1" ></i> 
                <span class="glyphicon glyphicon-thumbs-up col-md-2 likedata time-date commentlike" title="Total number likes for this comment" aria-hidden="true">
                <i class="likedata time-date" id="{{$comment->id}}">Like</i> </span>
                <i class="col-md-2 time-date" title="The time this comment was posted">{{date('j/n \'y', strtotime($comment->created_at))}} </i> 
              @if(Auth::check() && (Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor'))
                <span class="col-md-2">
                  @if($trend->status ==='active')
                <a href="{{url('/delete-comment/'.$comment->id)}}"> <i id="{{$comment->id}}" title="block this comment" class="glyphicon glyphicon-trash time-date"> </i> </a>
                 @else
                <a href="{{url('/delete-comment/'.$comment->id)}}"> <i id="{{$comment->id}}" title="unblock this comment" class="glyphicon glyphicon-trash time-date"> </i> </a>
                 @endif
                 <a href="{{url('/unblock-comment/'.$comment->id)}}"> <i title="Edit this comment" class="glyphicon glyphicon-edit time-date"> </i> </a>
             </span>
             <i class="col-md-2 glyphicon glyphicon-thumbs-up" aria-hidden="true"> </i>
             @if($trend->post_importance==='vote')
              <a href="{{url('/add-option/'.$trend->id)}}"> <i title="Add option to this post" class="time-date">add option </i> </a>
              @endif
              </div>
             @endif
              	</div>
              </div>
              @endforeach
              @endif
       
            <!--- comment form -->
           @if(Auth::check() && !Auth::check())
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
                <form id="commentForm" name="commentForm"  action="{{url('/post-comment')}}" method="post">
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
          @else
        <div class="col-md-6 center-block">
          No votes posted yet
        </div>
         @endif
           @if(!Auth::check())
        <div class="col-md-12">
         <p><a href="#" data-toggle="modal" data-target="#loginModalAny" data-placement="top"> Login </a> or
          <a href="#"data-toggle="modal" data-target="#signupModalAny" data-placement="top" data-toggle="modal" data-target="#addPostModal" data-placement="top"> register</a> to like or comment on any post </p>
        </div>
        @endif
        </div>  
    </div>
@endsection