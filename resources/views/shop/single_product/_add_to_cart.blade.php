{{ Form::open(['route' => 'store_product', 'method' => 'post']) }}
<div class="clearfix" style="z-index: 1000;">

    <!-- Product Quantity -->
    <div class="product_quantity clearfix">
        <span>Количество: </span>
        <input id="quantity_input" type="text" pattern="[0-9]*" value="1" name="quantity">
        <input type="hidden" name="product" value={{$product->id}}>
        <div class="quantity_buttons">
            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
        </div>
    </div>

</div>

<div class="product_price">{{$product->price.' ₽'}}</div>
<div class="button_container">
    <button type="submit" class="button cart_button">
        В корзину
    </button>
    <div class="product_fav {{ app('wishlist')->getContent()->contains('id', $product->id) ? "active" : "" }}">
        <input type="hidden" class="product_fav_value" value={{$product->id}}>
        <i class="fas fa-heart"></i>
    </div>
</div>
{{ Form::close() }}
