@extends('layout.master')

@section('title', 'Shop')

@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/shop_styles.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/shop_responsive.css')}}>
@endsection

@section('content')
    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src={{asset('images/shop_background.jpg')}}></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">
                {{isset($currentCategory) ? $currentCategory->name : 'All Products'}}
            </h2>
        </div>
    </div>

    <div class="shop">
        <div class="container">
            @include('shop.breadcrumbs')
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop_sidebar">
                        @include('shop._categories', ['categories' => $categories])
                        @include('shop._filter_form', ['brands' => $brands, 'currentCategory' => $currentCategory])
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="shop_content">

                        {{-- Sorting Menu--}}
                        @include('shop.sort_menu')

                        <!-- Product Grid -->
                        @include('shop.product_grid')

                        <!-- Shop Page Navigation -->
                        {{ $products->appends(request()->input())->links() }}

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('layout.modal_window.modal')

@endsection

@section('extraJs')
    <script src= {{asset('plugins/Isotope/isotope.pkgd.min.js')}}></script>
    <script src= {{asset('plugins/greensock/TweenMax.min.js')}}></script>
    <script src= {{asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}></script>
    <script src= {{asset('plugins/parallax-js-master/parallax.min.js')}}></script>

    <script src= {{asset('js/shop_custom.js')}}></script>
    <script src= {{asset('js/add_to_cart.js')}}></script>
    <script src= {{asset('js/add_to_wishlist.js')}}></script>
    <script src= {{asset('js/sort_selector.js')}}></script>
@endsection
