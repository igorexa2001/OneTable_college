<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTable shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/png">

    <link rel="stylesheet" type="text/css" href={{ asset('css/bootstrap4/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('plugins/OwlCarousel2-2.2.1/animate.css')}}>
    <link rel="stylesheet" type="text/css" href={{ asset('plugins/slick-1.8.0/slick.css') }}>
    @yield('styles')
</head>

<body>

<div class="super_container">

    <!-- Header -->
    <header class="header">

        <!-- Top Bar -->
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon">
                                <img src= {{asset('images/phone.png')}} alt="">
                            </div>
                            {{settings('phone')}}
                        </div>
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon">
                                <img src= {{asset('images/mail.png')}} alt="">
                            </div>
                            <a href="mailto:{{settings('email')}}">{{settings('email')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Main -->
        @include('layout.header_main')


        <!-- Main Navigation -->
        @include('layout.navigation_main')

    </header>


    @yield('content')


    <!-- Subscribe -->
    @include('layout._subscribe')

    <!-- Footer -->
    @include('layout.footer')

    <!-- Copyright -->
{{--    @include('layout.copyright')--}}

</div>

<script src={{ asset('js/jquery-3.3.1.min.js')}}></script>
<script src={{ asset('css/bootstrap4/popper.js')}}></script>
<script src={{ asset('css/bootstrap4/bootstrap.min.js')}}></script>
<script src={{ asset('plugins/greensock/TimelineMax.min.js')}}></script>
<script src={{ asset('plugins/scrollmagic/ScrollMagic.min.js')}}></script>
<script src={{ asset('plugins/greensock/animation.gsap.min.js')}}></script>
<script src={{ asset('plugins/greensock/ScrollToPlugin.min.js')}}></script>
<script src={{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}></script>
<script src={{ asset('plugins/slick-1.8.0/slick.js')}}></script>
<script src={{ asset('plugins/easing/easing.js')}}></script>
<script src={{ asset('js/custom.js')}}></script>
<script src= {{asset('js/categories_hide.js')}}></script>
@yield('extraJs')

</body>

</html>
