<div class="product_panel panel">
    <div class="arrivals_slider slider">

        <!-- Slider Item -->
        @foreach($weRecommendItems as $weRecommendItem)
            <div class='product_item {{$weRecommendItem->is_new ? 'is_new' : ""}} {{$weRecommendItem->is_sale ? 'discount' : ''}}'
                 style="cursor: default">
                <div class="product_border" ></div>
                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                    @if($weRecommendItem->productPicture->first() != Null)
                        <img src={{ asset($weRecommendItem->productPicture->first()->path_to_image) }} alt="">
                    @else
                        <img src={{ asset('images/products/product_null.png') }} alt="">
                    @endif
                </div>
                <div class="product_content d-flex flex-column align-items-center justify-content-center">
                    @if ($weRecommendItem->is_sale == 1)
                        <div class="product_price">{{'$'.$weRecommendItem->price*0.75}}<span>{{'$'.$weRecommendItem->price}}</span></div>
                    @else
                        <div class="product_price">{{'$'.$weRecommendItem->price}}</div>
                    @endif
                    <div class="product_name"><div><a href="/shop/product/{{$weRecommendItem->slug}}" tabindex="0">{{$weRecommendItem->name}}</a></div></div>
                    <button class="btn-primary buy_button_single" id="buy_button" value="{{$weRecommendItem->id}}">Buy</button>
                </div>
                {{--                                                <div class="product_fav {{ app('wishlist')->getContent()->contains('id', $weRecommendItem->id) ? "active" : "" }}">--}}
                {{--                                                    <input type="text" value="{{ $weRecommendItem->id }}" class="d-none product_fav_value"><i--}}
                {{--                                                        class="fas fa-heart"></i>--}}
                {{--                                                </div>--}}
                <ul class="product_marks">
                    <li class="product_mark product_discount">-25%</li>
                    <li class="product_mark product_new">new</li>
                </ul>
            </div>
        @endforeach

    </div>
    <div class="arrivals_slider_dots_cover"></div>
</div>
