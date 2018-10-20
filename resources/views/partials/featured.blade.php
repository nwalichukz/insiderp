<div class="bg-grey-lightest p-2 rounded mb-2">
    <div class="text-sm border-b px-3 pb-2">Featured posts</div>
    
    <div class="flex p-2 overflow-x-auto">
         @foreach($featured as $feature)

        <div class="flex flex-no-shrink -mr-48">
            <div class="w-1/2 bg-white rounded shadow">
                <a href="{{ url('/post-full-view/'.$feature->id.'/'.str_slug(strtolower($feature->title), '-')) }}">
                    <div class="mb-1">
                        <img src="{{asset("images/post/".$Helper->postImageFirst($feature->id)->name)}}" alt="The image for the featured post" class="w-full">
                    </div>
                    <div class="text-xs p-1 flex flex-wrap">{{$Helper->get_title(title_case(strtolower($feature->title)), 10)}}... </div>
                </a>
            </div>
        </div>

        @endforeach
    </div>
</div>