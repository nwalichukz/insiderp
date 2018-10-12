<div class="bg-grey-lightest p-2 rounded mb-2">
    <div class="text-sm border-b px-3 pb-2">Featured posts</div>
    
    <div class="flex items-center justify-center mr-1">
         @foreach($featured as $feature)
        <div class="w-1/4 bg-white rounded shadow mr-2">
            <a href="{{ url('/post-full-view/'.$feature->id.'/'.str_slug(strtolower($feature->title), '-')) }}">
                <div class="mb-1">
                    <img src="{{asset("images/post/".$Helper->postImage($feature->id)->name)}}" alt="The image for the featured post" class="w-full rounded">
                </div>
                <div class="text-xs p-1">{{$Helper->get_title(title_case(strtolower($feature->title)), 6)}}... </div>
            </a>
        </div>
        @endforeach
    </div>
</div>