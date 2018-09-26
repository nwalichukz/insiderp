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
                                    <a href="{{ url('/post-full-view/'.$lead->id.'/'.str_slug(strtolower($lead->title), '-')) }}" class="text-lg text-blue hover:underline hover:text-blue-dark">{{$Helper->get_title(title_case(strtolower($lead->title)), 10)}}</a>
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
            </div>
            <div class="w-full md:w-2/5 md:mx-4">
                @if(empty($title))
                    @include('partials.search-bar')
                @endif
                @if($posts->count() > 0)
                    @include('partials.post-item')
                @else
                <div class="bg-white text-center rounded py-3 px-4">Ahhh!... No posts yet, sorry. Try again.</div>
                @endif
                <div class="mt-4">{{ $posts->links() }}</div>
            </div>
           <div></div>
            <div class="w-full md:w-1/4">
                <div class="bg-white py-3 px-4">
                    <div class="mb-2 text-lg">Bido Pages</div>
                    <div class="border-b mb-2"></div>
                    <div class="bd-links px-3">
                        <ul class="list-reset flex flex-wrap">
                            @foreach($cat as $category)
                            <li class="mb-1 mr-1">
                            <a href="{{url("/page/".$category->name)}}" class="text-base text-blue-light hover:text-blue-dark mb-2">{{$category->name}}, </a>
                          </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> 

        </div>
    </div>
@endsection