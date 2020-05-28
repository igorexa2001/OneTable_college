@extends('layout.master')
@section('content')
    <link rel="stylesheet" type="text/css" href={{asset("css/bootstrap4/bootstrap.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("plugins/fontawesome-free-5.0.1/css/fontawesome-all.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("plugins/OwlCarousel2-2.2.1/owl.carousel.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("plugins/OwlCarousel2-2.2.1/owl.theme.default.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("plugins/OwlCarousel2-2.2.1/animate.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/product_styles.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/product_responsive.css")}}>

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="images/single_4.jpg"><img src="images/single_4.jpg" alt=""></li>
                    <li data-image="images/single_2.jpg"><img src="images/single_2.jpg" alt=""></li>
                    <li data-image="images/single_3.jpg"><img src="images/single_3.jpg" alt=""></li>
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected">
                    <img src="images/single_4.jpg" alt="">
                </div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">Laptops</div>
                    <div class="product_name">MacBook Air 13</div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="product_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum. laoreet turpis, nec </p></div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <div class="clearfix" style="z-index: 1000;">

                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="product_price">$2000</div>
                            <div class="button_container">
                                <button type="button" class="button cart_button">Add to Cart</button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>

                            <div class="button_container">
                                <button type="button" id="productBuy" value="" class="button cart_button">
                                    Купить
                                </button>
                                <div
                                    class="product_fav  ">
                                    <input type="text" value="" class="d-none product_fav_value">
                                    <i class="fas fa-heart"></i></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




    <script src={{asset("js/jquery-3.3.1.min.js")}}></script>
    <script src={{asset("css/bootstrap4/popper.js")}}></script>
    <script src={{asset("css/bootstrap4/bootstrap.min.js")}}></script>
    <script src={{asset("plugins/greensock/TweenMax.min.js")}}></script>
    <script src={{asset("plugins/greensock/TimelineMax.min.js")}}></script>
    <script src={{asset("plugins/scrollmagic/ScrollMagic.min.js")}}></script>
    <script src={{asset("plugins/greensock/animation.gsap.min.js")}}></script>
    <script src={{asset("plugins/greensock/ScrollToPlugin.min.js")}}></script>
    <script src={{asset("plugins/OwlCarousel2-2.2.1/owl.carousel.js")}}></script>
    <script src={{asset("plugins/easing/easing.js")}}></script>
    <script src={{asset("js/product_custom.js")}}></script>

    <script src={{asset('js/add_to_cart.js')}}></script>
@endsection
