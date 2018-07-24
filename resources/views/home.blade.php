@inject('Helper', 'App\HelperClass')
@extends('layouts.indextemplate')
@section('content')
<div class="container">
    <div class="row">
	        <div class="col-md-10" style="margin:0 20px 0 20px;">
            <div class="col-md-3 con">
               <h4 class="titles"> Lead Post </h4>
            <hr/>
       @if(!empty($lead->title))
      @if(!empty($Helper->postImage($lead->id)->name))
    <img src="{{asset("images/post/".$Helper->postImage($lead->id)->name)}}" style="width:100%; height:150px;" >

    <a href="{{ url('/post-full-view/'.$lead->id) }}"> <h4> {{$lead->title}} </h4> </a>
    @endif
    @endif
     </div>
			     <div class="col-md-7">
            <div style="border:1px solid #f1f1f1;" id="panel-heading" class="panel panel-primary">
              <div id="index-sutitle" class="panel-heading">@if(!empty($category)){{$category}} Page @elseif(!empty($search)) About {{$search->count()}} Search Results @else Trending Posts @endif</div>
              <div class="panel-body">
              	
              <!-- Ya just loop it here -->
            <div id="commentID">

      <!-- yes oh here start loop -->
      @if($trending->count() > 0)
      @foreach($trending as $trend)
                <div class="col-md-10 col-lg-10 avatarwrapper">
                                  <figure class="item-thumb">
                                    <a href="{{ url('/post-full-view/'.$trend->id) }}" title="The user name and the page this article was posted to">
                                    @if(!empty($Helper->postAvatar($trend->user_id)->name))
                                   <img src="{{asset("images/user/".$Helper->postAvatar($trend->user_id)->name)}}" class="img-circle imgcircle" alt="thumb">
                                   @else
                                    <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                                   @endif
                                    <span class=""><span >{{ucfirst(strtolower($Helper->user($trend->user_id)->user_name))}}</span> /<span style="color:#FF8C00;">{{$trend->category}} </span>
                                    </a>
                                </figure>
                          
                        @if(Auth::check() && (Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor'))
                        @if($trend->status ==='active')
                       <a href="{{url('/block-post/'.$trend->id) }}"> <i title="Block this post" class="trash glyphicon glyphicon-trash pull-right"> </i> </a>
                       @else
                       <a href="{{url('/unblock-post/'.$trend->id)}}"> <i title="unblock this post" class="trash glyphicon glyphicon-trash pull-right"> </i> </a>
                       @endif
                        <a href="{{url('/edit-post/'.$trend->id)}}"> <i title="Edit this post" class="edit glyphicon glyphicon-edit pull-right"> </i> </a>
                        @endif

                     </div>

                    <div class="container1 col-md-12 panel">
                      @if(!empty($Helper->postImage($trend->id)->name))
                      <div class="col-md-4" style="float:left;">
                      <img src="{{asset("images/post/".$Helper->postImage($trend->id)->name)}}" style="width:100%; height:150px;" >
                     </div>
                     <div class="col-md-8">
                      @if(!empty($trend->title))
                     <a href="{{ url('/post-full-view/'.$trend->id) }}"><h4>{{$Helper->get_title($trend->title, 10)}} </h4> </a>
                     @else
                      <a href="{{url('/post-full-view/'.$trend->id)}}"><h4>{{$Helper->get_title($trend->post, 10)}} </h4> </a>
                     @endif
                  <p style="font-size:1.1em;">
                    {{$Helper->get_words($trend->post, 23)}}  <a href="{{ url('/post-full-view/'.$trend->id) }}" title="click to read full details"> more </a>
                     </p>
                     
                  <span class="time-right">{{date('d F \'y \a\t h:i', strtotime($trend->created_at))}}</span> 
                  </div>
                  @else
      
                   @if(!empty($trend->title))
                     <a href="{{ url('/post-full-view/'.$trend->id) }}"> <h4>{{$Helper->get_title($trend->title, 10)}} </h4> </a>
                     @else
                      <a href="{{ url('/post-full-view/'.$trend->id) }}"> <h4>{{$Helper->get_title($trend->post, 10)}} </h4> </a>
                     @endif
                  <p style="font-size:1.1em;">
                    {{$Helper->get_words($trend->post, 23)}} <a href="{{ url('/post-full-view/'.$trend->id) }}" title="click to read full details"> more </a>
                     </p>
                     
                      <span class="time-right">{{date('d F \'y \a\t h:i', strtotime($trend->created_at))}}</span>
                   
                 
                  @endif
                </div>
                <div style="margin-bottom:8px;" class="col-md-10 col-lg-10" id="postBox">
                <span class="glyphicon glyphicon-thumbs-up col-md-3" title="Total number likes for this post" aria-hidden="true"><i class="likedata"> {{$trend->rank}}</i> </span>
                <span class="col-md-3" title="Total number of times this post is viewed" aria-hidden="true">
                  <i class="likedata time-date">
                  @if(!empty($Helper->postView($trend->id)->view))
                  {{$Helper->postView($trend->id)->view}} views @endif
                </i>
                  </span>
                  @if(Auth::check())
                <a href="{{url("post-like/".$trend->user_id.'/'.$trend->id)}}" >
                <span class="like glyphicon glyphicon-thumbs-up col-md-3" title="Like this post" aria-hidden="true"><i class="likedata time-date" onclick="postLike(event);" id="{{$trend->id}}"> Like</i></span> 
              </a>
              @endif
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
                </div>
                 <div class="container2 col-md-9">
                  <p style="font-size:1.2em;">
                    <a href="#"><span>{{ucfirst(strtolower($Helper->commenter($comment->user_id)->user_name))}}</span></a> 
                {{ucfirst($comment->comment)}}
                     </p>
                </div>
                <div>
                 <div class="col-md-12" id="likeBox">
                <i class="col-md-3" ></i>
                @if(Auth::check()) 
                <span class="col-md-1 likedata commentlike"  aria-hidden="true">
                <a href="{{url("post-like/".$trend->user_id.'/'.$trend->id)}}"><i class="likedata time-date" title="like this comment" onclick="postLike(event);" id="{{$comment->id}}">Like</i> </a> </span>
                @endif
                <i class="col-md-2 time-date" title="The time this comment was posted">{{date('j/n \'y', strtotime($comment->created_at))}} </i> 
                 <i class="col-xs-3 col-sm-3 col-md-3 glyphicon glyphicon-thumbs-up" title="Total number of likes for this comment" aria-hidden="true">3 </i>
              </div>
                </div>
              </div>
              </div>
              @endforeach
              @endif
          <!--- comment form -->

    
         <!---yes stop loop here  -->
         @endforeach
          @if(!Auth::check())
        <div class="col-md-10 col-lg-10 center-block logincomment">
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
        <div class="con col-md-2">
			 <!-- pentalk pages -->
            <h4 class="titles"> Bido Pages </h4>
            <hr/>  
			 <ul class="lead-story-header">
			 	@foreach($cat as $category)
			 <a href="{{url("/page/".$category->name)}}"><li>{{$category->name}} </li> </a>
       @endforeach
			 </ul>
			 </div>
            </div>
				  <br/><br/> 
			</div>
        </div>
    </div>
</div>
@endsection