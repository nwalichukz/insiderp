@inject('Helper', 'App\HelperClass')
@extends('layouts.indextemplate')
@section('content')
    <div class="mt-16">
        <div class="container mx-auto md:flex md:flex-wrap px-3 justify-center">

            <div class="w-full md:w-1/2">
                <div class="full-view-item">
                    <div class="bg-white py-3 px-4">
                        <div class="flex">
                            <div>
                                @if(!empty($Helper->postAvatar($trend->user_id)->name))
                                    <img src="{{asset("images/user/".$Helper->postAvatar($trend->user_id)->name)}}"
                                         class="h-10 rounded-full mr-3" alt="user image"/>
                                @else
                                    <img src='{{asset("images/avatar/avatar.png")}}' class="h-10 rounded-full mr-3"
                                         alt="thumb"/>
                                @endif
                            </div>

                            <div>
                                <div>
                                    <a href="{{url('/post/'.$Helper->user($trend->user_id)->user_name)}}"
                                       title='view all post by {{$Helper->user($trend->user_id)->user_name}}'
                                       class="text-blue">{{ucfirst(strtolower($Helper->user($trend->user_id)->user_name))}}
                                        /<span class="text-orange">{{$trend->category}}</span></a>
                                    <div class="text-xs text-grey-dark my-2">{{date('d F \'y \a\t h:i:a', strtotime($trend->created_at))}}</div>
                                    <div class="flex -ml-1">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u= "
                                           title="share this article on facebook" class="flex items-center mr-3">
                                            <img src="{{asset("images/avatar/facebook.png")}}" class="twitter-facebook"
                                                 style="width:20px;">
                                            <span class="ml-1 text-sm">Share</span>
                                        </a>

                                        <a href="https://twitter.com/home?status= "
                                           title="share this article on twitter" style="width:20px;"
                                           class="flex items-center">
                                            <img src="{{asset("images/avatar/twitter.png")}}" class="twitter-facebook">
                                            <span class="ml-1  text-sm">Share</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="mb-6 pb-2">
                            @if(!empty($Helper->postImage($trend->id)))

                                <div class="swiper-container mb-4 shadow" style="width: 100%; height: 100%; margin-left: auto; margin-right: auto;">
                                    <div class="swiper-wrapper">
                                        @foreach($Helper->postImage($trend->id) as $postImage)
                                            <img src="{{ asset('images/post/'.$postImage->name) }}" alt="Post Image" class="w-full swiper-slide">
                                        @endforeach
                                    </div>
                                        <div class="swiper-pagination"></div>

                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>

                                        <div class="swiper-scrollbar"></div>
                                </div>


                                <div class="px-4 mb-3">
                                    <div class="mb-2">
                                        <h3>{{title_case($Helper->get_title($trend->title, 30))}} </h3>
                                    </div>

                                    <div>
                                        <p class="text-sm">
                                            {!! ucfirst($trend->post)  !!}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="px-4 mb-3">
                                    <div class="mb-2">
                                        <h3>{{title_case($Helper->get_title($trend->title, 30))}} </h3>
                                    </div>

                                    <div>
                                        <p class="text-sm">
                                            {!! ucfirst($trend->post) !!}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="action-center flex items-center justify-between px-4">
                            <div>
                                @if(Auth::user())
                                    <a href="{{url("post-like/".$trend->user_id.'/'.$trend->id)}}"
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

                                        <b class="likedata"> {{$Helper->getLikes($trend->id)}}</b>
                                    </a>
                                @else
                                    <b class="likedata"> {{$Helper->getLikes($trend->id)}} Likes</b>
                                @endif
                            </div>
                            <div class="flex items-center">
                                @include('template.icons.view')
                                @if(!empty($Helper->postView($trend->id)->view))
                                    {{number_format($Helper->postView($trend->id)->view)}}
                                @endif
                            </div>
                            <div class="flex items-center">
                                @include('template.icons.comment')
                                @if($Helper->commentCount($trend->id))
                                    {{ $Helper->commentCount($trend->id) }}
                                @endif
                            </div>
                        </div>
                        <hr>
                        @if(Auth::check())
                            <div class="comment-area flex items-center justify-between my-3">
                                <div class="w-1/6 lg:pl-10">
                                    <a href="#">
                                        @if(!empty($Helper->postAvatar($trend->user_id)->name))
                                            <img src="{{asset("images/user/".$Helper->postAvatar($trend->user_id)->name)}}"
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
                                        <input type="hidden" name="post_id" id="postid" value="{{$trend->id}}">
                                        <div class="flex items-center">
                                            <div class="w-full mr-3">
                                                <textarea name="comment" rows="2"
                                                          value="{{ old('comment') }}"
                                                          placeholder="Enter your comment here.."
                                                          class="w-full  py-2 px-4 border-b-2 border-grey bg-grey-lightest focus:bg-white focus:border-blue focus:outline-none"
                                                          required></textarea>
                                            </div>
                                            <div>
                                                <button class="py-2 px-4 rounded bg-blue text-white hover:bg-blue-dark"
                                                        type="submit"
                                                ><i class="fa fa-comment"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else

                        @endif

                        <div class="comments bg-white">
                            <div class="px-4 py-3">
                                @if(!empty($Helper->commentAll($trend->id)))
                                    @foreach($Helper->commentAll($trend->id) as $comment)
                                        <div class="flex bg-grey-lighter rounded p-2 mb-3">
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
                                                            <a href="{{url("post-like/".$trend->user_id.'/'.$trend->id)}}"
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

                                                                <b> {{$Helper->getLikes($trend->id)}}</b>
                                                            </a>
                                                        </div>

                                                        <div>
                                                            <span class="text-xs text-grey-dark">{{date('d/n\'y \a\t h:i:a', strtotime($comment->created_at))}} </span>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <div class="text-left text-xs text-grey-dark">
                                                                <span class="text-sm">{{date('d/n\'y \a\t h:i:a', strtotime($comment->created_at))}} </span>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                     <!--Fb comments goes in here -->
                    <div class="fb-comments" data-href="http://{{'www.bido.com.ng/post-full-view/'.$trend->id.'/'.str_slug(strtolower($trend->title), '-')}}"
                     data-numposts='10'>
                    </div>
                                   <br>

                                    <div class="mt-2">@if(!empty($related))
                                            <h3 class="my-2">Related Posts </h3>
                                            @foreach ($related as $relatedpost)
                                                <ul class="list-reset">
                                                    <li>
                                                        <a class="text-blue text-sm"
                                                           href="{{ url('/post-full-view/'.$relatedpost->id.'/'.str_slug(strtolower($relatedpost->title), '-')) }}"
                                                           title="click to read full details"> {{$Helper->get_title(title_case(strtolower($relatedpost->title)), 25)}} </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        // Template slider jQuery script

        $(document).ready(function() {
            let swiper = new Swiper('.swiper-container', {
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                speed: 300,
                pagination: {
                    el: '.swiper-pagination',
                    dynamicBullets: true,
                },
            });

        });

    </script>
@endsection
