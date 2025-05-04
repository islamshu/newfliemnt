<div class="container mt-5">
    <div class="slider" dir="ltr">
        @foreach ($main_cats as $item)
            
        <div class="text-center">
            <a href="#" class="text-decoration-none text-dark img-header">
                <img loading="lazy" src="{{$item->image }}"
                    style="max-width: 80%;border-radius: 50%;overflow: hidden;"
                    class="border border-2 ms-auto me-auto shadow" width="" alt="">
                <p class="mt-2">{{$item->title}}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>