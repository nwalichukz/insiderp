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
                                    <a href="{{ url('/post-full-view/'.$lead->id.'/'.str_slug(strtolower($lead->title), '-')) }}" class="text-lg text-blue hover:underline hover:text-blue-dark">{{$Helper->get_title(ucfirst(strtolower($lead->title)), 10)}}</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                @if(!empty($trendpost))
                    <div class="bg-white rounded px-4 py-4 mb-4">
                        <div class="trending-posts bg-grey-lighter py-3 mb-4">
                            <p class="text-xl underline text-left px-4">Trending Posts</p>
                            <div class="post py-3 px-4 text-lg">
                                @foreach($trendpost as $post)
                                    <p class="mb-2">
                                      <a href="{{ url('/post-full-view/'.$post->id.'/'.str_slug(strtolower($post->title), '-')) }}">{{$Helper->get_title(ucfirst(strtolower($post->title)), 13)}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <div class="bg-white rounded px-4 py-4 mb-4">
                    <div class="text-xl text-left border-b-2 pb-2 px-4 mb-4">Bido Pages</div>

                    <dropdown-link class="px-4">
                        <span slot="link" class="appearance-none flex items-center inline-block font-medium" style="color: #777777;">
                          <span class="mr-1">All Pages</span>
                          <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                          </svg>
                        </span>
                        <div slot="dropdown" class="bg-white shadow rounded border overflow-hidden mx-3">
                            <a class="dropdown-item" href="{{url(Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}">Loop through pages </a>
                        </div>
                    </dropdown-link>
                </div>
            </div>
            <div class="w-full md:w-2/5 md:mx-4">
                @if(empty($title))
                    @include('partials.search-bar')
                @endif
                @include('partials.featured')
                @if($posts->count() > 0)
                    @include('partials.post-item')
                @else
                <div class="bg-white text-center rounded py-3 px-4">Ahhh!... No posts yet, sorry. Try again.</div>
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