
        <div class="mt-16">
            <div class="container mx-auto md:flex md:items-start p-3">
                <div class="w-full md:w-1/4 mb-2">
                    <div class="bg-white px-4 py-4">
                        <div class="lead-post bg-grey-lighter py-3 mb-4">
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
                        @if(!empty($trendpost))
                        <div class="trending-posts bg-grey-lighter py-3 mb-4">
                            <p class="text-xl underline text-left px-4">Trendind Posts</p>
                            <div class="post py-3 px-4 text-center text-lg">
                                @foreach($trendpost as $post)
                                <p class="mb-2"><a href="{{ url('/post-full-view/'.$post->id.'/'.str_slug(strtolower($post->title), '-')) }}">{{$Helper->get_title(ucfirst(strtolower($post->title)), 13)}}</a></p>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="w-full md:w-2/5 md:mx-4">
                    @if(empty($title))
                    <div class="search flex items-center relative mb-3">
                        <form action="{{url('/post-search')}}" method="POST">
                            {{ csrf_field() }}
                            <input onkeyup="autocomplet()" type="text" name="name" id="search" placeholder="Find any news or articles" class="w-full py-3 px-8 rounded" value="{{old('name')}}" autofocus>
                            <span class="absolute ml-2 text-grey-dark">
                                <svg class="h-5 w-5 fill-current"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18pt" height="18pt" viewBox="0 0 18 18" version="1.1"><g id="surface1"><path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 6.75 1.5 C 3.824219 1.5 1.5 3.824219 1.5 6.75 C 1.5 9.675781 3.824219 12 6.75 12 C 8.042969 12 9.214844 11.539063 10.125 10.78125 L 10.5 11.15625 L 10.5 11.765625 L 15.234375 16.5 L 16.5 15.234375 L 11.765625 10.5 L 11.109375 10.5 L 10.757813 10.148438 C 11.527344 9.234375 12 8.054688 12 6.75 C 12 3.824219 9.675781 1.5 6.75 1.5 Z M 6.75 3 C 8.851563 3 10.5 4.648438 10.5 6.75 C 10.5 8.851563 8.851563 10.5 6.75 10.5 C 4.648438 10.5 3 8.851563 3 6.75 C 3 4.648438 4.648438 3 6.75 3 Z "/></g></svg>
                            </span>
                        </form>
                    </div>
                    @endif
                        @if($trending->count() > 0)
                        @include('partials.post-item')
                        @endif

                </div>
                <div class="w-full md:w-1/4">
                    <div class="bg-white py-3 px-4">
                        <div class="mb-2 text-lg">Pages</div>
                        <div class="border-b mb-2"></div>

                        <div class="bd-links px-3">
                            <ul class="list-reset flex flex-wrap">
                                <li class="mb-1 mr-1"><a href="#" class="text-base text-blue-light hover:text-blue-dark mb-2">Home, </a></li>
                                <li class="mb-1 mr-1"><a href="#" class="text-base text-blue-light hover:text-blue-dark mb-2">Home, </a></li>
                                <li class="mb-1 mr-1"><a href="#" class="text-base text-blue-light hover:text-blue-dark mb-2">Home, </a></li>
                                <li class="mb-1 mr-1"><a href="#" class="text-base text-blue-light hover:text-blue-dark mb-2">Home, </a></li>
                                <li class="mb-1 mr-1"><a href="#" class="text-base text-blue-light hover:text-blue-dark mb-2">Home, </a></li>
                                <li class="mb-1 mr-1"><a href="#" class="text-base text-blue-light hover:text-blue-dark mb-2">Home, </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/x-template" id="dropdown-link-template">
        <div class="relative">
            <div role="button" class="inline-block select-none" @click="open = !open">
                <slot name="link"></slot>
            </div>
            <div class="absolute pin-l mt-px" v-show="open">
                <slot name="dropdown"></slot>
            </div>
        </div>
    </script>
    <script>
        Vue.component('dropdown-link', {
            template: '#dropdown-link-template',
            data() {
                return {
                    open: false
                }
            }
        });

        new Vue({
            el: "#app",
            data: {
                open: false,
            },

            methods: {
                toggle() {
                    this.open = !this.open
                }
            },
        });
    </script>
</body>
</html>