<div class="swiper mySwiper rounded shadow" style="height: 600px;">
    <div class="swiper-wrapper">
        <!-- Slide 1 -->
        @foreach ($sliders as $item)
        <div class="swiper-slide">
            <a href="{{$item->url}}" class="text-decoration-none text-dark">
                <img loading="lazy" src="{{$item->image}}" class="w-100 h-100 object-fit-cover" alt="">
            </a>
        </div>
        @endforeach
        
        <!-- Slide 2 -->
        
        <!-- Add more slides as needed -->
    </div>
    <!-- Add navigation buttons -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <!-- Add pagination -->
    <div class="swiper-pagination"></div>
</div>