<div class="swiper-container my-4">
    <div class="swiper-wrapper">
        @foreach($featured as $feature)
            <div class="swiper-slide flex flex-no-shrink bg-white border border-solid h-64 w-64">
                <div>
                    <div>
                        <img src="{{ asset("images/post/".$Helper->postImageFirst($feature->id)->name) }}" alt="The image for the featured post">
                    </div>
                    <div class="px-4 py-4 flex flex-wrap">
                        {{$Helper->get_title(title_case(strtolower($feature->title)), 10)}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>

    <div class="swiper-button-prevd"></div>
    <div class="swiper-button-nextd"></div>

    <div class="swiper-scrollbard"></div>
</div>
