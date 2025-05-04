@extends('layouts.frontend')
@section('title', $category->name)
    
@section('content')
    <section class="container">

       


        <nav aria-label="breadcrumb " style="margin-top: 15%;margin-bottom:40px;">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item text-info"><a href="/" class="text-info text-decoration-none"
                        style="font-size: 14px;">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="font-size: 14px;">{{ $category->name }} </li>
            </ol>
        </nav>

        <h5 class="text-start text-secondary container">
            {{ $category->name }} </h5>
        <!-- itmes -->
        <div class="container">
            <div class="row">
                @foreach ($category->products()->orderby('id','desc')->get() as $item)
                <div class="col-md-3 col-6 mb-2">
                    <a href="{{route('single_product',$item->slug)}}" class="text-decoration-none">
                        <div class="product">
    
    
                            <div class="product-entry__image mb-2">
                                <img loading="lazy" src="{{ asset($item->getImageUrl()) }}"
                                    class="d-block m-auto " style="object-fit:contain;width:100%;"
                                    alt="{{$item->name}}">
    
                            </div>
                            <div class="container position-relative">
                                <p class="productName my-0 mt-2 mb-1">   {{$item->name}}  </p>
                                
                                <span class="text-danger pricewithout fw-bold fs-6 fs-lg-5">
                                    {{ $item->discount == 0 ? $item->price : $item->price - $item->discount }}
                                </span>
                                <span class="text-danger fw-bold fs-6 fs-lg-5">
                                    {{ get_general_value('currancy') }}
                                </span>
                                
                                @if($item->discount != 0)
                                    <span class="text-decoration-line-through text-secondary ms-2">
                                        {{ $item->price }} {{ get_general_value('currancy') }}
                                    </span>
                                @endif
                                <div>
                                    <form action="{{route('cart.store')}}"  method="POST">
                                        @csrf
                                        <input type="hidden" name="qnt" value="1" id="">
                                        <input type="hidden" name="product_id" value="{{$item->id}}" id="">
    
                                        <div class="d-flex align-items-center gap-2">
                                            <button type="submit" name="addCart"
                                                class="btn btn-sm btn-pro addTCartBtn">
                                                إضافة للسلة
                                            </button>
    
                                            <button type="submit" name="addCart"
                                                class="btn btn-sm btn-pro loveBtn">
                                                <img loading="lazy"
                                                    src="{{ asset('front/assets/image/icons/heart.png') }}"
                                                    width="20" height="21" alt="">
                                            </button>
                                        </div>
    
                                    </form>
                                </div>
    
    
                            </div>
    
    
                        </div>
                    </a>
                </div>
                @endforeach
                
             
            </div>
        </div>
    </section>
@endsection
