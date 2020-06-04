
        <!-- Slider Item -->
        @foreach($onSaleItems as $onSaleItem)
            <div class='product_item {{$onSaleItem->is_new ? 'is_new' : ""}} {{$onSaleItem->is_sale ? 'discount' : ''}}'
                 style="cursor: default">
                <div class="product_border"></div>
                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                    <img src={{ $onSaleItem->productPicture->first()->path_to_image }} alt="">
                </div>
                <div class="product_content d-flex flex-column align-items-center justify-content-center">
                    @if ($onSaleItem->is_sale == 1)
                        <div class="product_price">{{$onSaleItem->price*0.75.' ₽'}}<span>{{$onSaleItem->price.' ₽'}}</span></div>
                    @else
                        <div class="product_price">{{$onSaleItem->price.' ₽'}}</div>
                    @endif
                    <div class="product_name"><div><a href="/shop/product/{{$onSaleItem->slug}}" tabindex="0">{{$onSaleItem->name}}</a></div></div>
                    <button class="btn-primary buy_button_single" id="buy_button" value="{{$onSaleItem->id}}">Купить</button>
                </div>
                {{--                                                <div class="product_fav {{ app('wishlist')->getContent()->contains('id', $onSaleItem->id) ? "active" : "" }}">--}}
                {{--                                                    <input type="text" value="{{ $onSaleItem->id }}" class="d-none product_fav_value"><i--}}
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
