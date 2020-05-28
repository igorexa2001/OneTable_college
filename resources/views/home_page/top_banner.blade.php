<div class="banner_2">
    <div class="banner_2_background" style="background-image:url({{asset('images/banner_2_background.jpg')}})"></div>
    <div class="banner_2_container">
        <div class="banner_2_dots"></div>
        <!-- Banner Slider -->
        <div class="owl-carousel owl-theme banner_2_slider">

            <!-- Banner Slider Item -->
            @foreach($mainSliderItems as $mainSliderItem)
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">
                                            <a href="/shop/{{$mainSliderItem->product->category()->first()->slug}}">{{$mainSliderItem->product->category()->first()->name}}</a>
                                        </div>
                                        <div class="banner_2_title">{{$mainSliderItem->product->name}}</div>
                                        <div class="banner_2_text">{{$mainSliderItem->product->description}}</div>
                                        <div class="rating_r rating_r_4 banner_2_rating"></div>
                                        <div class="button banner_2_button"><a href="/shop/product/{{$mainSliderItem->product->slug}}">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image">
                                            @if($mainSliderItem->product->productPicture->first())
                                                <img src={{asset($mainSliderItem->product->productPicture->first()->path_to_image)}} alt="">
                                            @else
                                                <img src={{ asset('images/products/product_null.png') }} alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
