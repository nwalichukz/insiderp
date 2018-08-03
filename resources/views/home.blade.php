@inject('Helper', 'App\HelperClass')
@extends('layouts.indextemplate')
@section('content')
<div class="container">
    <div class="row">
	        <div class="col-md-10" style="margin:10px 20px 0 20px;">
            <div class="col-md-3 con">
            <div class="col-md-12 trendBox con">
               <h4 class="titles"> Lead Post </h4>
            <hr/>
       @if(!empty($lead->title))
      @if(!empty($Helper->postImage($lead->id)->name))
    <img src="{{asset("images/post/".$Helper->postImage($lead->id)->name)}}" style="width:100%; height:150px;" >

    <a href="{{ url('/post-full-view/'.$lead->id.'/'.str_replace(' ', '-', strtolower($lead->title))) }}"> <h4> {{$Helper->get_title(ucfirst(strtolower($lead->title)), 10)}} </h4> </a>
    @endif
    @endif
     </div>
     <br/>
        @if(!empty($trendpost))
          <div class="col-md-12 con" style="border:1px solid #eee;">
               <h4 class="titles"> Trending </h4>
            <hr/>      
            @foreach($trendpost as $post)
    <a href="{{ url('/post-full-view/'.$post->id.'/'.str_replace(' ', '-', strtolower($post->title))) }}"> <h4 class="trending"> {{$Helper->get_title(ucfirst(strtolower($post->title)), 10)}} </h4> </a>
    @endforeach
     </div>
     @endif
   </div>
			     <div class="col-md-7">
      @if(empty($title))
    <div class="col-md-12 center-block">
    <form method="POST" action="{{url('/post-search')}}"> 
         {{ csrf_field() }}
      <div class="form-group">
     <div class="searchinputwrapper">
     <input onkeyup="autocomplet()" type="text" name="name" id="search" class="name" value="{{old('name')}}" autofocus> 
     <div id="content" class="col-md-11"> </div>

     <button type="submit" class="searchbtn">
   <span class="glyphicon glyphicon-search"> </span> </button>
    </div>
</div>
    </form>
    </div>
    @endif

            <div style="border:1px solid #f1f1f1;" id="panel-heading" class="panel panel-primary">
              <div id="index-sutitle" class="panel-heading">@if(!empty($category)){{$category}} Posts @elseif(!empty($search)) About {{$search->count()}} Search Results @else Trending Posts @endif</div>
              <div class="panel-body">
              	
              <!-- Ya just loop it here -->
            <div id="commentID">

      <!-- yes oh here start loop -->
      @if($trending->count() > 0)
      @foreach($trending as $trend)
                <div class="col-md-10 avatarwrapper">
                                  <figure class="item-thumb">
                                    <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_replace(' ', '-', strtolower($trend->title))) }}" title="The user name and the page this article was posted to">
                                    @if(!empty($Helper->postAvatar($trend->user_id)->name))
                                   <img src="{{asset("images/user/".$Helper->postAvatar($trend->user_id)->name)}}" class="img-circle imgcircle" alt="thumb">
                                   @else
                                    <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                                   @endif
                                  {{ucfirst(strtolower($Helper->user($trend->user_id)->user_name))}}/<span style="color:#FF8C00;">{{$trend->category}} </span>
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

                    <div class="container1 col-md-11 panel">
                      @if(!empty($Helper->postImage($trend->id)->name))
                      <div class="col-md-4" style="float:left;">
                      <img src="{{asset("images/post/".$Helper->postImage($trend->id)->name)}}" style="width:100%; height:150px;" >
                     </div>
                     <div class="col-md-8">
                      @if(!empty($trend->title))
                     <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_replace(' ', '-', strtolower($trend->title))) }}"> <h4> {{ucfirst($Helper->get_title($trend->title, 10))}}</h4></a>
                     @else
                      <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_replace(' ', '-', strtolower($trend->title))) }}"><h4>{{ucfirst($Helper->get_title($trend->post, 10))}} </h4> </a>
                     @endif
                  <p style="font-size:1.1em;">
                    {{ucfirst($Helper->get_words($trend->post, 23))}}  <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_replace(' ', '-', strtolower($lead->title))) }}" title="click to read full details"> more </a>
                     </p>
                     
                  <span class="time-right">{{date('d F \'y \a\t h:i:a', strtotime($trend->created_at))}}</span> 
                  </div>
                  @else
      
                   @if(!empty($trend->title))
                     <a href='{{ url("/post-full-view/".$trend->id.'/'.str_replace(' ', '-', strtolower($trend->title))) }}'> <h4> {{ucfirst($Helper->get_title($trend->title, 10))}} </h4> </a>
                     @else
                      <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_replace(' ', '-', strtolower($trend->title))) }}"> <h4>{{ucfirst($Helper->get_title($trend->post, 10))}} </h4> </a>
                     @endif
                  <p style="font-size:1.1em;">
                    {{ucfirst($Helper->get_words($trend->post, 23))}} <a href="{{ url('/post-full-view/'.$trend->id.'/'.str_replace(' ', '-', strtolower($trend->title))) }}" title="click to read full details"> more </a>
                     </p>
                     
                      <span class="time-right">{{date('d F \'y \a\t h:i:a', strtotime($trend->created_at))}}</span>
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
                     <span class="time-date pull-right">{{date('d/m \'y \a\t h:i:a', strtotime($comment->created_at))}} </span>
                </div>
                <div>
                 <div class="col-md-12" id="likeBox">
                <i class="col-md-3" ></i>
                @if(Auth::check()) 
                <span class="col-md-3 likedata commentlike"  aria-hidden="true">
                <a href='{{url("comment-like/".$comment->id)}}'><i class="likedata time-date" title="like this comment" onclick="commentLike(event);" id="{{$comment->id}}">{{$Helper->commentLike($comment->id)}} Like</i> </a> </span>
                @endif
                
               </div>
                </div>
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
                <div clas="col-md-9">             
                <form id="commentForm" name="commentForm" action="{{url('/post-comment')}}" method="post">
                   {{ csrf_field() }}
                  <input type="hidden" name="post_id" id="postid" value="{{$trend->id}}">
                 <div class="col-sm-9">
                    <div class="form-group">
                        <textarea name="comment" id="commentarea" style="border-radius:25px;" class="form-control" rows="1" autofocus="true" value="{{ old('comment') }}" placeholder="Leave a comment" required></textarea>
                    </div>
                    <button type="submit" class="pull-right btn"><i class="glyphicon glyphicon-send"></i></button>
                </div>
                 </form>
            </div>
        </div>
        @endif

    
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
      <div class="col-md-6 center-block">
          {{$trending->links()}}
      </div>
        </div>
    </div>
</div>
@endsection