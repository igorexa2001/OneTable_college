@foreach($newItems as $newItem)
    <div class="arrivals_slider_item">
        <div class="border_active"></div>
        <div class='product_item is_new d-flex flex-column align-items-center justify-content-center text-center'
             style="cursor: default">

                <div class="product_border"></div>
                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                    <a href={{route('oneProduct', ['slug' => $newItem->slug])}}>
                        <img src={{$newItem->productPicture->first()->path_to_image }} alt="">
                    </a>
                </div>
                <div class="product_content">
                    @if ($newItem->is_sale == 1)
                        <div class="product_price">{{$newItem->price.' ₽'}}<span>{{$newItem->price*1.75.' ₽'}}</span></div>
                    @else
                        <div class="product_price">{{$newItem->price.' ₽'}}</div>
                    @endif
                    <div class="product_name">
                        <div>
                            <a href="/shop/product/{{$newItem->slug}}" tabindex="0">{{$newItem->name}}</a>
                        </div>
                    </div>
                        <div class="product_extras">
                            <button style="cursor: pointer;" class="buy_button_single product_cart_button" id="buy_button" value="{{$newItem->id}}">Купить</button>
                        </div>
                </div>
                <ul class="product_marks">
                    <li class="product_mark product_discount">-25%</li>
                    <li class="product_mark product_new">new</li>
                </ul>

        </div>
    </div>
@endforeach


