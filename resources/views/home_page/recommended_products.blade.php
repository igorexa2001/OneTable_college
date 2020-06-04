<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="clearfix tabs-right">
                        <div class="new_arrivals_title">Выбор пользователей</div>
                    </div>

                    <div class="bestsellers_panel panel active">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->

                            @foreach($weRecommendItems as $weRecommendItem)
                            <div class="bestsellers_item {{$weRecommendItem->is_new ? 'is_new' : ""}} {{$weRecommendItem->is_sale ? 'discount' : ''}}">
                                <a href="{{route('oneProduct', ['slug' => $weRecommendItem->slug])}}">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image">
                                        <img src={{$weRecommendItem->productPicture->first()->path_to_image }} alt="">
                                    </div>
                                    <div class="bestsellers_content">
{{--                                        <div class="bestsellers_category"><a href="/shop/{{$weRecommendItem->category()->first()->slug}}">{{$weRecommendItem->category()->first()->name}}</a></div>--}}
                                        <div class="bestsellers_name"><a href="/shop/product/{{$weRecommendItem->slug}}">{{$weRecommendItem->name}}</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"></div>
                                        <div class="bestsellers_price {{$weRecommendItem->is_sale ? 'discount' : ''}}">{{$weRecommendItem->price.' ₽'}}
                                            {{$weRecommendItem->is_sale ? `<span>($weRecommendItem->price*1.75.' ₽')</span>` : ''}}
                                        </div>
                                    </div>
                                </div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
