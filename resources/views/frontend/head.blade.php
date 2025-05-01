<!DOCTYPE html>

<html lang="ar" dir="rtl">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="generator" content="Odoo">
    <meta name="facebook-domain-verification" content="b5l8edofe72hrd12a9tnexduz31hbm">
    <meta name="keywords" content="a store, astore, astore, electronic store">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{get_general_value('website_name')}} | Online Shopping | {{get_general_value('website_name')}}">
    <meta property="og:site_name" content="{{get_general_value('website_name')}}">
    <meta property="og:image" content="{{asset('storage/'.get_general_value('web_logo'))}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.css">

    <title> {{get_general_value('website_name')}} @if(!request()->routeIs('home')) | @yield('title')@endif</title>
    <link rel="icon" type="image/x-icon" class="w-100" href="{{asset('storage/'.get_general_value('web_logo'))}}">
    <link rel="stylesheet" href="{{asset('front/ajax/libs/slick-carousel/1.8.1/slick.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front/ajax/libs/slick-carousel/1.8.1/slick-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('front/assets/css/all.css')}}" />
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.rtl.css')}}" />
    <link rel="stylesheet" href="{{asset('front/cdn.jsdelivr.net/npm/swiper%4011/swiper-bundle.min.css')}}" />

    <link rel="stylesheet" href="{{asset('front/myStyle.css')}}" />
<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
@yield('styles')
</head>
<style>
    .toast {
    position: fixed;
    top: 20px;
    right: 20px;
}
</style>
<style>
    .primaryColor {
    color: white;
    background-color: {{get_general_value('primary_color')}} !important;
    }
    .btn-pro:hover {
    background-color: {{get_general_value('forgin_color')}};
    color: white;
}
.quote {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background-color: {{get_general_value('forgin_color')}} !important;
    line-height: 24px;
    text-align: center;
}
.btn-dark {
    background-color: {{get_general_value('forgin_color')}} !important;
    border-color: {{get_general_value('forgin_color')}} !important;
}

    .btn-dark {
    --bs-btn-color: #fff;
    --bs-btn-bg: {{get_general_value('forgin_color')}};
    --bs-btn-border-color: {{get_general_value('forgin_color')}};
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #424649;
    --bs-btn-hover-border-color: #373b3e;
    --bs-btn-focus-shadow-rgb: 66, 70, 73;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #4d5154;
    --bs-btn-active-border-color: #373b3e;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #212529;
    --bs-btn-disabled-border-color: #212529;
}

</style>
<body>


    <div class="loaderk d-flex justify-content-center align-items-center">
    </div>

    
