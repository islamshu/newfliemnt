@include('frontend.head')
@include('frontend.header')

<main>
    <section class="mt-5 sSm" style="margin-top: 120px!important;">

        <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner pt-md-5 pt-3">
                <div class="carousel-item ">
                    <img loading="lazy" src="{{ asset('front/uploads/1812324939.') }}"
                        class="d-block w-100 d-block d-md-none" height="200" alt="...">
                    <img loading="lazy" src="{{ asset('front/uploads/1812324939.') }}"
                        class="d-block w-100 d-none d-md-block" height="400" alt="...">

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- /carousel -->
    <section class="container mt-4 mb-3 sSm" style="margin-top: 5rem;">


        @include('frontend.slider')
        @include('frontend.main_categories')
        @include('frontend.sub_categories')



        <!-- /card 1 -->
        <a href="https://wa.me/+123" class="contact p-1 rounded-circle text-center"
            style="background-color:#4dc247;width:50px;height:50px;">
            <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
        </a>


</main>

@include('frontend.reviews')
@include('frontend.footer')
