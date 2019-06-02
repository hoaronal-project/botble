@isset($videoList)
    <div class="video-section">
        <div class="swiper-container swiper-video">
            <div class="swiper-wrapper">
                @foreach($videoList as $video)
                    <div class="swiper-slide">
                        <div class="embed-responsive embed-responsive-4by3">
                            {!! $video->embed !!}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
@endisset
