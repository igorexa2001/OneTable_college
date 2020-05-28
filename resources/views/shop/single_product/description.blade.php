<div class="col-lg-5 order-3">
    <div class="product_description">
        <div class="product_category">
            <a href ='/shop/{{$product->category()->first()->slug}}'>{{$product->category()->first()->name}}</a>
        </div>
        <div class="product_name">{{$product->name}}</div>
        <div class="product_text"><p>{{$product->description}}</p></div>
        <div class="order_info d-flex flex-row">
            {{-- Add to Cart --}}
            @include('shop.single_product._add_to_cart')
        </div>
    </div>
</div>
