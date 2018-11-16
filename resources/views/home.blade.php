@inject('Helper', 'App\HelperClass')
@extends('layouts.indextemplate')
@section('content')
    <div class="mt-11">
        <div class="container mx-auto md:flex md:justify-center md:items-start p-3">
            <div class="w-full md:w-1/4 mb-2">
                <div class="bg-white rounded px-4 py-4 mb-2">
                    <div class="lead-post bg-grey-lighter py-3 mb-3">
                        <p class="text-xl underline text-left px-4">Lead Post  </p>

                        <div class="trending py-3 px-4">
                            @if(!empty($lead->title))
                                @if(!empty($Helper->postImageFirst($lead->id)->name))
                                    <img src="{{asset("images/post/".$Helper->postImageFirst($lead->id)->name)}}" alt="post image" class="mb-3">
                                    <a href="{{ url('/post-full-view/'.$lead->id.'/'.str_slug(strtolower($lead->title), '-')) }}" class="text-md text-blue hover:underline hover:text-blue-dark">{{$Helper->get_title(title_case(strtolower($lead->title)), 10)}}</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
               
                <div class="bg-white rounded px-4 py-4 mb-2">

                    <dropdown-link class="px-4">
                        <span slot="link" class="appearance-none flex items-center inline-block font-medium" style="color: #777777;">
                          <span class="mr-1 text-black">Bido Pages</span>
                          <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                          </svg>
                        </span>
                        <div slot="dropdown" class="bg-white shadow rounded border overflow-hidden mx-3">
                            <div class="bd-links px-3 mt-2">
                           <ul class="list-reset flex flex-wrap">
                            @foreach($cat as $category)
                            <li class="mb-1 mr-1">
                            <a href="{{url("/page/".$category->name)}}" title='View all Posts about {{$category->name}}' class="text-base text-black hover:text-blue-dark mb-2">{{$category->name}}, </a>
                          </li>
                            @endforeach
                        </ul>
                    </div>
                        </div>
                    </dropdown-link>
                </div>

                @if(!empty($trendpost))
                    <div class="bg-white rounded px-4 py-4 mb-4">
                        <div class="trending-posts bg-grey-lighter py-3 mb-4">
                            <p class="text-xl underline text-left px-4">Trending Posts</p>
                            <div class="post py-3 px-4 text-md">
                                @foreach($trendpost as $post)
                                    <p class="mb-2">
                                      <a href="{{ url('/post-full-view/'.$post->id.'/'.str_slug(strtolower($post->title), '-')) }}">{{$Helper->get_title(ucfirst(strtolower($post->title)), 13)}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                   <!--Ads begin section-->
                   <div class="bg-white rounded px-4 py-4 mb-2">
                    <div class="lead-post bg-grey-lighter py-3 mb-3">
                        <p class="text-xl underline text-left px-4">Sponsored</p>
                        <div class="trending py-3 px-4">
                                    <img src="{{asset("images/avatar/ads1.jpeg")}}" style="height:300px;" alt="post image" class="mb-3">
                                    
                        </div>
                    </div>
                </div>

                <!--Ads end -->

            </div>
            <div class="w-full md:w-1/2 md:mx-4">
                @if(empty($title))
                    @include('partials.search-bar')
                @endif
                @if(!empty($featured))
                @include('partials.featured')
                @endif
                @if($posts->count() > 0)
                    @include('partials.post-item')
                @else
                <div class="bg-white text-center rounded py-3 px-4">Ahhh!... No posts yet, sorry. Try again.</div>
                @endif
                <div class="mt-4">{{ $posts->links() }}</div>
            </div>

           <div></div>
    
        </div>
    </div>

   <script>
        // Template slider jQuery script

        $(document).ready(function() {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 3,
                spaceBetween: 10,
                slidesPerGroup: 3,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                // navigation: {
                //     nextEl: '.swiper-button-next',
                //     prevEl: '.swiper-button-prev',
                // },
            });

        });

    </script>
@endsection