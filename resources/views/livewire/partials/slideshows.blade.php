<section class="bannerSliderBlock bannerSlider w-100 slickSlider text-center text-white">
    @if($slideshows->isNotEmpty())

        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($slideshows as $slideshow)
                    <div class="swiper-slide swipe1" style="
                        background-image:url({{ optional($slideshow->getImage())->url }});
                        background-size: cover;
                        background-position: center center;
                        background-repeat: no-repeat;
                        "></div>
                @endforeach


            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    @endif
</section>
