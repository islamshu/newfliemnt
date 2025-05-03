<div class="swiper mySwiper rounded shadow" style="height: 100%; max-height: 600px;">
    <div class="swiper-wrapper">
        @foreach ($sliders as $item)
        <div class="swiper-slide">
            <a href="{{$item->url}}" class="text-decoration-none text-dark">
                <img loading="lazy" src="{{$item->image}}" class="w-100 h-100 object-fit-cover" style="aspect-ratio: 16/7; object-fit: cover;" alt="">
            </a>
        </div>
        @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
