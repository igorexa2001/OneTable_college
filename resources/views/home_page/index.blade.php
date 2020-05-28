@extends('layout.master')

@section('title', 'OneTable')

@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset('css/main_styles.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/responsive.css')}}>
{{--    <link rel="stylesheet" type="text/css" href={{asset('css/new_product_style.css')}}>--}}
@endsection

@section('content')
    <!-- Banner -->
    @include('home_page.top_banner')

    <!-- Delivery Methods -->
    @include('home_page.delivery_methods')

    <!-- Product Slider -->
    @include('home_page.product_slider.new_product_slider')

    <!-- Recommended Product Panel -->
    @include('home_page.recommended_products')

    <!-- Popular Categories -->
    @include('home_page.popular_categories')

    <!-- Adverts -->
    @include('home_page.adverts')

    <!-- Brands Slider -->
    @include('home_page.brands_slider')

    <!-- Modal -->
    @include('layout.modal_window.modal')

@endsection

@section('extraJs')
    <script src={{asset('js/add_to_cart.js')}}></script>
@endsection
