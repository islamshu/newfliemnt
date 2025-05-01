@extends('layouts.frontend')
@section('content')
@php
    
@endphp
<section class="mt-5 py-3" style="margin-bottom: 90px !important;">
</section>

<div class="container page-container">
    <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb mt-4" style="margin-top:2.5rem !important;">
                        <li class="breadcrumb-item text-info"><a href="/" class="text-info text-decoration-none" style="font-size: 14px;">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="font-size: 14px;"> {{get_page_title($page)}}

</li>
                    </ol>
                </nav>
                <div class="flex justify-center">
                <div class="content content--single-page col-md-8 p-4 m-auto w-full lg:w-9/12 bg-white border rounded p-6 lg:p-8 mt-4 lg:mt-12">
                    <div class="content-entry">
                
                        {!!get_general_value($page)!!}

                </div>
            </div>
        </div>
@endsection