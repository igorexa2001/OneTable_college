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
                                            @foreach($mainSliderItem->product->category()->get() as $category)
                                                <a href="/shop/{{$category->slug}}" style="margin-right: 10px">{{$category->name}}</a>
                                            @endforeach
                                        </div>
                                        <div class="banner_2_title">{{$mainSliderItem->product->name}}</div>
                                        <div class="banner_2_text">{{$mainSliderItem->product->description}}</div>
                                        <div class="rating_r rating_r_4 banner_2_rating"></div>
                                        <div class="button banner_2_button"><a href="/shop/product/{{$mainSliderItem->product->slug}}">Подробнее</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image">
                                            <img src="{{$mainSliderItem->product->productPicture->first()->path_to_image}}"
                                                style="width: 70%; margin-left: 70px;" alt="">
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
