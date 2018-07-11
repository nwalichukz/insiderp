<div class="item-wrap">
            <!-- yes oh here start loop -->
                <div class="col-md-10 col-lg-10 avatarwrapper">
                   <div class="media-left">
                            <div class="figure-block">
                                <figure class="item-thumb">
                                    <a href="{{ url('#') }}" title="The user name and the page this posted">
                                    @if(!empty($Helper->postAvatar($trend->user_id)->name))
                                   <img src="{{asset("images/user/".$Helper->postAvatar($trend->user_id)->name)}}" class="img-circle imgcircle" alt="thumb">
                                   @else
                                    <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                                   @endif
                                    <span class=""><span style=";">{{$Helper->user($trend->user_id)->user_name}}</span> /<span style="color:#FF8C00;">{{$trend->category}} </span>
                                    </a>
                                    
                                </figure>

                            </div>

                        </div>

                     </div>

                    <div style="color:#000;" class="container1 col-md-10 col-lg-12">
                      @if(!empty($Helper->postImage($trend->id)->name))
                      <div style="border:1px solid #fff;" class="col-md-3 col-lg-4" style="width:100px; float:left; height:200px; margin:0 5px 0 5px;">
                      <img src="{{asset("images/post/".$Helper->postImage($trend->id)->name)}}" style="width:100%; height:200px;" alt="">
                     </div>
                     <div style="border:1px solid #fff;" class="col-md-9 col-lg-8">
                  <div class="media-body media-midd">
                    <div class="my-description">
                  <p style="font-size:1.4em; text-align:justify; color:#000;">
                    {{$trend->post}}
                     </p>
                     
                      <span class="time-right">{{date('d F, Y', strtotime($trend->created_at))}}</span>
                    </div>
                  </div>
                  </div>
                  @else
                  <div class="media-body media-middle">
                    <div class="my-description">
                  <p style="font-size:1.4em; text-align:justify; color:#000;">
                    {{$trend->post}} 
                     </p>
                     
                      <span class="time-right">{{ $trend->created_at->diffForHumans()}}</span>
                    </div>
                  </div>
                  @endif
                </div>
                <div style="margin-bottom:8px;" class="col-md-10 col-lg-10" id="likeBox">
                <span class="glyphicon glyphicon-thumbs-up col-md-3" title="Total number likes for this post" aria-hidden="true"><i class="likedata"> {{$trend->rank}}</i> </span>
                <span class="glyphicon glyphicon-eye col-md-3" title="Total number of times this post is viewed" aria-hidden="true"><i class="likedata"> 60 <i class="likedata glyphicon glyphicon-record"></i></i> </span>
                <a href="{{url("post-like/".$trend->user_id.'/'.$trend->id)}}">
                <span class="like glyphicon glyphicon-thumbs-up col-md-3" title="Like this post" aria-hidden="true"><i class="likedata"> Like</i></span> 
              </a>
                  <span class="pull-right" title="Total number of comments for this post">
                    @if($Helper->commentCount($trend->id) > 1)
                  {{ $Helper->commentCount($trend->id) }} comments
                  @else
                  {{$Helper->commentCount($trend->id) }} comment
                  @endif</span>
                </div>

                <!--- comment box -->
                @if(!empty($Helper->commentAll($trend->id)))
                @foreach($Helper->commentAll($trend->id) as $comment)
    
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
                 <div style="border: 0;" class="container2 col-md-9 col-lg-9">
                  <div class="media-body media-middle">
                    <div class="my-description">
                  <p style="font-size:1.3em; text-align:justify; color:#000;">
                    <a href="#"><span>{{$Helper->commenter($comment->user_id)->user_name}}</span></a> 
                {{$comment->comment}}
                     </p>
        
                    </div>
                  </div>
                </div>
                <div>
                  <i class="col-md-3" title=""></i> 
                <span class="glyphicon glyphicon-thumbs-up col-md-3 likedata commentlike" title="Total number likes for this comment" aria-hidden="true">
                <i class="likedata">Like</i> </span>
                <i class="col-md-2" title="The time this comment was posted">{{date('j/n \'y \a\t g:i', strtotime($comment->created_at))}} </i> 
                <div class="col-md-1">
                
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
                  <img src='{{asset("images/imgHome/j.jpg")}}' class="img-circle imgcircle" alt="thumb">
                </a>
                </div>
                <div clas="col-md-10 col-lg-10">             
                <form id="commentForm" name="commentForm" action="{{url('/post-comment')}}" method="post">
                   {{ csrf_field() }}
                  <input type="hidden" name="post_id" value="{{$trend->id}}">
                 <div class="col-sm-9">
                    <div class="form-group">
                        <textarea name ="comment" style="border-radius:25px;" class="form-control" rows="1" autofocus="true" value="{{ old('description') }}" placeholder="write a comment" required></textarea>
                    </div>
                    <button type="submit" class="pull-right btn"><i class="glyphicon glyphicon-send"></i></button>
                </div>
                 </form>
            </div>
        </div>
        @else
    </br>
        <div class="col-md-6 col-lg-6 center-block logincomment">
         <p><a href="#" data-toggle="modal" data-target="#loginModalAny" data-placement="top"> Login </a> or
          <a href="#"data-toggle="modal" data-target="#signupModalAny" data-placement="top" data-toggle="modal" data-target="#addPostModal" data-placement="top"> register</a> to like or comment on any post </p>
        </div>

        @endif
         <div class="col-md-12 col-lg-12 center-block>" >
            <p class="paginateText">{{ $Helper->commentAll($trend->id)->links() }}</p>
        </div>
         <!---yes stop loop here  -->
        </div>