@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
    <div class="mt-16 flex justify-center px-3">
        <div class="w-full md:w-2/5 bg-white rounded">
            @if($posts->count() >= 0)
                @foreach($posts as $post)
                    <div class="posts bg-white rounded-b shadow-md py-3 px-4 mb-4">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center">
                                @if(!empty($Helper->postAvatar($post->user_id)->name))
                                    <img src="{{asset("images/user/".$Helper->postAvatar($post->user_id)->name)}}"
                                         alt="" class="h-10 rounded-full mr-3">
                                @else
                                    <img src="{{asset("images/avatar/avatar.png")}}" alt=""
                                         class="h-10 rounded-full mr-3">
                                @endif
                                <div>
                                    <a href="#"
                                       class="text-blue">{{ucfirst(strtolower($Helper->user($post->user_id)->user_name))}}
                                        /<span class="text-orange">{{$post->category}}</span></a>
                                    <div class="text-xs text-grey-dark mt-1">{{date('d F \'y \a\t h:i:a', strtotime($post->created_at))}}</div>
                                </div>
                            </div>
                            <div>
                                @if(Auth::check())
                                    <dropdown-link>
                    <span slot="link" class="appearance-none flex items-center inline-block font-medium"
                          style="color: #777777;">
                      <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                      </svg>
                    </span>

                                        <div slot="dropdown"
                                             class="bg-white shadow rounded border overflow-hidden -ml-24       ">
                                            @if(Auth::check() && (Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor'))
                                                @if($post->status ==='active')
                                                    <a class="dropdown-item" href="{{url('/block-post/'.$post->id) }}">Block
                                                        post</a>
                                                @else
                                                    <a class="dropdown-item"
                                                       href="{{url('/unblock-post/'.$post->id) }}">Unblock post</a>
                                                @endif
                                            @endif

                                            @if((Auth::check() && (Auth::user()->id === $post->user_id)) || (Auth::check() && (Auth::user()->user_level === 'admin')))
                                                <a class="dropdown-item" href="{{url('/edit-post/'.$post->id) }}">Edit
                                                    post</a>
                                                <a class="dropdown-item" href="{{url('/delete-post/'.$post->id) }}">Delete
                                                    post</a>
                                            @endif

                                        </div>
                                    </dropdown-link>
                                @endif

                            </div>
                        </div>
                        <hr>
                        <div class="post-body mt-6 mb-3">
                            @if(!empty($Helper->postImageFirst($post->id)->name))
                                <div class="text-lg capitalize mb-3"><a
                                            href="{{url($post->id.'/'.str_slug(strtolower($post->title), '-'))}}"
                                            class="text-blue-light hover:text-blue-dark hover:underline">{{title_case(strtolower($Helper->get_title($post->title, 19)))}}</a>
                                </div>
                                <div class="post-image mb-3"><img
                                            src="{{asset("images/post/".$Helper->postImageFirst($post->id)->name)}}"
                                            alt="" class="w-full"></div>
                                <div class="post-text overflow-x-auto">
                                    {!!ucfirst($Helper->get_words($post->post, 35))!!} <a
                                            href="{{ url($post->id.'/'.str_slug(strtolower($post->title), '-')) }}"
                                            title="click to read full details" class="text-blue"> more </a>
                                </div>
                            @else
                                <div class="post-text overflow-x-auto">
                                    <a href='{{ url($post->id."/".str_slug(strtolower($post->title), '-')) }}'>
                                        <h4> {{title_case($Helper->get_title($post->title, 19))}} </h4></a>
                                    {!!ucfirst($Helper->get_words($post->post, 32))!!} <a
                                            href="{{ url($post->id.'/'.str_slug(strtolower($post->title), '-')) }}"
                                            title="click to read full details"> more </a>
                                </div>
                            @endif
                        </div>

                        <div class="action-center flex items-center justify-between px-4 mb-3">
                            <div>
                                @if(Auth::user())
                                    <a href="{{url("post-like/".$post->user_id.'/'.$post->id)}}"
                                       class="flex items-center">
                                        <svg class="fill-current h-5 w-5 mr-4 text-blue" version="1.1" id="Capa_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 28.069 28.068"
                                             style="enable-background:new 0 0 28.069 28.068;" xml:space="preserve"><g>
                                                <path d="M22.984,16.959c0-0.888-0.468-1.637-1.142-2.115c0.674-0.48,1.142-1.229,1.142-2.118c0-1.459-1.187-2.646-2.646-2.646 h-5.203V2.645C15.135,1.186,13.711,0,11.961,0S8.788,1.186,8.788,2.645v7.563c-2.117,0.483-3.703,2.373-3.703,4.634v8.465 c0,2.625,2.136,4.762,4.761,4.762h10.493c1.459,0,2.646-1.186,2.646-2.645c0-0.889-0.468-1.638-1.142-2.117 c0.674-0.479,1.142-1.229,1.142-2.116s-0.468-1.636-1.142-2.116C22.516,18.596,22.984,17.848,22.984,16.959z M9.847,2.646 c0-0.875,0.949-1.587,2.116-1.587s2.116,0.712,2.116,1.587v7.435H9.847V2.646z M20.338,18.546h-8.465 c-0.292,0-0.529,0.237-0.529,0.529s0.237,0.528,0.529,0.528h8.465c0.875,0,1.588,0.713,1.588,1.588s-0.713,1.587-1.588,1.587 h-8.465c-0.292,0-0.529,0.235-0.529,0.528s0.237,0.528,0.529,0.528h8.465c0.875,0,1.588,0.712,1.588,1.589 c0,0.875-0.713,1.586-1.588,1.586H9.847c-2.041,0-3.703-1.662-3.703-3.703v-8.465c0-2.042,1.662-3.704,3.703-3.704h10.492 c0.875,0,1.588,0.712,1.588,1.587s-0.713,1.587-1.588,1.587h-8.465c-0.292,0-0.529,0.236-0.529,0.529 c0,0.291,0.237,0.527,0.529,0.527h8.465c0.875,0,1.588,0.712,1.588,1.587S21.213,18.546,20.338,18.546z"/>
                                            </g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g></svg>

                                        <b class="likedata"> {{$Helper->getLikes($post->id)}}</b>
                                    </a>
                                @else
                                    <b class="likedata"> {{$Helper->getLikes($post->id)}} Likes</b>
                                @endif
                            </div>
                            <div class="flex items-center">
                                @include('template.icons.view')
                                @if(!empty($Helper->postView($post->id)->view))
                                    {{$Helper->postView($post->id)->view}}
                                @endif
                            </div>
                            <div class="flex items-center">
                                @include('template.icons.comment')
                                @if($Helper->commentCount($post->id))
                                    {{ $Helper->commentCount($post->id) }} comments
                                @endif
                            </div>
                        </div>

                        @if(Auth::check())
                            <div class="comment-area flex items-center justify-between my-3">
                                <div class="w-1/6 lg:pl-10">
                                    <a href="#">
                                        @if(!empty($Helper->postAvatar($post->user_id)->name))
                                            <img src="{{asset("images/user/".$Helper->postAvatar($post->user_id)->name)}}"
                                                 class="h-8 rounded-full mr-3" alt="user image"/>
                                        @else
                                            <img src='{{asset("images/avatar/avatar.png")}}'
                                                 class="h-8 rounded-full mr-3" alt="thumb"/>
                                        @endif
                                    </a>
                                </div>
                                <div class="w-4/5 -ml-10">
                                    <form id="commentForm" name="commentForm" action="{{url('/post-comment')}}"
                                          method="post" class="flex items-center">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="post_id" id="postid" value="{{$post->id}}">
                                        <div class="flex items-center">
                                            <div class="w-full mr-3"><textarea name="comment" rows="2"
                                                                               value="{{ old('comment') }}"
                                                                               placeholder="Enter your comment here.."
                                                                               class="w-full  py-2 px-4 border-b-2 border-grey bg-grey-lightest focus:bg-white focus:border-blue focus:outline-none"
                                                                               required></textarea></div>
                                            <div>
                                                <button class="py-2 px-4 rounded bg-blue text-white hover:bg-blue-dark"
                                                        type="submit"><i class="fa fa-comment"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="my-3">You need to be logged in to add a comment...
                                <login></login>
                            </div>
                        @endif

                        <div class="comments bg-white">
                            <div class="px-4 py-3">
                                @if(!empty($Helper->comment($post->id)))
                                    @foreach($Helper->comment($post->id) as $comment)
                                        <div class="flex bg-grey-lighter rounded-lg p-2 mb-3">
                                            <div class="mr-3">
                                                <a href="{{ url('#') }}">
                                                    @if(!empty($Helper->commenterAvatar($comment->user_id)->name))
                                                        <img src="{{asset("images/user/".$Helper->commenterAvatar($comment->user_id)->name)}}"
                                                             class="h-10 rounded-full mr-3" alt="thumb">
                                                    @else
                                                        <img src='{{asset("images/avatar/avatar.png")}}'
                                                             class="h-10 rounded-full mr-3" alt="thumb avatar">
                                                    @endif
                                                </a>
                                            </div>

                                            <div>
                                                <div class="mb-1">
                                                    <div class="mb-2 text-blue capitalize">{{$Helper->commenter($comment->user_id)->user_name}}</div>

                                                    <p>{{ucfirst($comment->comment)}}</p>
                                                </div>
                                                <div class="text-right flex items-center justify-between">
                                                    @if(Auth::check())
                                                        <div class="mr-2">
                                                            <a href="{{url("post-like/".$post->user_id.'/'.$post->id)}}"
                                                               class="flex items-center">
                                                                <svg class="fill-current h-5 w-5 mr-2 text-blue"
                                                                     version="1.1" id="Capa_1"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                     y="0px" viewBox="0 0 28.069 28.068"
                                                                     style="enable-background:new 0 0 28.069 28.068;"
                                                                     xml:space="preserve"><g>
                                                                        <path d="M22.984,16.959c0-0.888-0.468-1.637-1.142-2.115c0.674-0.48,1.142-1.229,1.142-2.118c0-1.459-1.187-2.646-2.646-2.646 h-5.203V2.645C15.135,1.186,13.711,0,11.961,0S8.788,1.186,8.788,2.645v7.563c-2.117,0.483-3.703,2.373-3.703,4.634v8.465 c0,2.625,2.136,4.762,4.761,4.762h10.493c1.459,0,2.646-1.186,2.646-2.645c0-0.889-0.468-1.638-1.142-2.117 c0.674-0.479,1.142-1.229,1.142-2.116s-0.468-1.636-1.142-2.116C22.516,18.596,22.984,17.848,22.984,16.959z M9.847,2.646 c0-0.875,0.949-1.587,2.116-1.587s2.116,0.712,2.116,1.587v7.435H9.847V2.646z M20.338,18.546h-8.465 c-0.292,0-0.529,0.237-0.529,0.529s0.237,0.528,0.529,0.528h8.465c0.875,0,1.588,0.713,1.588,1.588s-0.713,1.587-1.588,1.587 h-8.465c-0.292,0-0.529,0.235-0.529,0.528s0.237,0.528,0.529,0.528h8.465c0.875,0,1.588,0.712,1.588,1.589 c0,0.875-0.713,1.586-1.588,1.586H9.847c-2.041,0-3.703-1.662-3.703-3.703v-8.465c0-2.042,1.662-3.704,3.703-3.704h10.492 c0.875,0,1.588,0.712,1.588,1.587s-0.713,1.587-1.588,1.587h-8.465c-0.292,0-0.529,0.236-0.529,0.529 c0,0.291,0.237,0.527,0.529,0.527h8.465c0.875,0,1.588,0.712,1.588,1.587S21.213,18.546,20.338,18.546z"/>
                                                                    </g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g>
                                                                    <g></g></svg>

                                                                <b> {{$Helper->getLikes($post->id)}}</b>
                                                            </a>
                                                        </div>

                                                        <div>
                                                            <span class="text-xs text-grey-dark">{{date('d\'y \a\t h:i:a', strtotime($post->created_at))}} </span>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <div class="text-left text-xs text-grey-dark">
                                                                <span class="text-sm">{{date('d\'y \a\t h:i:a', strtotime($post->created_at))}} </span>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div>Login to like or comment</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection