<div class="bg-grey-lightest p-2 rounded mb-2">
    <div class="text-sm border-b px-3 pb-2">Featured posts</div>
    
    <div class="flex items-center p-2 max-w-md overflow-x-scroll">
         @foreach($featured as $feature)
        <div class="w-full bg-white rounded shadow mr-2">
            <a href="{{ url('/post-full-view/'.$feature->id.'/'.str_slug(strtolower($feature->title), '-')) }}">
                <div class="mb-1">
                    <img src="{{asset("images/post/".$Helper->postImageFirst($feature->id)->name)}}" alt="The image for the featured post" class="w-full rounded">
                </div>
                <div class="text-xs p-1 flex flex-wrap">{{$Helper->get_title(title_case(strtolower($feature->title)), 6)}}... </div>
            </a>
        </div>

        @endforeach
    </div>
</div>