
<div class="product_grid">
    <div class="product_grid_border"></div>

    @foreach($products as $product)
        <a href={{route('oneProduct', ['slug' => $product->slug])}}>
        <div class="product_item {{$product->is_new == '1' ? 'is_new' : ($product->is_sale == '1' ? 'discount': '')}}">
            <div class="product_border"></div>
            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                <img src={{ $product->productPicture->first()->path_to_image }} alt="">
            </div>

            <div class="product_content">
                @if ($product->is_sale == 1)
                    <div class="product_price">{{$product->price.' ₽'}}<span>{{$product->price*1.25.' ₽'}}</span></div>
                @else
                    <div class="product_price">{{$product->price.' ₽'}}</div>
                @endif
                <div class="product_name"><div>
                    <a href="/shop/product/{{$product->slug}}" tabindex="0">{{$product->name}}</a>
                </div></div>
                <button class="btn btn-primary buy_button_single" id="buy_button" value="{{$product->id}}" style="cursor: pointer">Купить</button>
            </div>
            <div class="product_fav {{ app('wishlist')->getContent()->contains('id', $product->id) ? "active" : "" }}">
                <input type="text" value="{{ $product->id }}" class="d-none product_fav_value">
                <i class="fas fa-heart"></i>
            </div>

            <ul class="product_marks">
                <li class="product_mark product_discount">-25%</li>
                <li class="product_mark product_new">new</li>
            </ul>
        </div>
        </a>
    @endforeach

</div>
