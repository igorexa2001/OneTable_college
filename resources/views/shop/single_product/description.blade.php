<div class="col-lg-5 order-3">
    <div class="product_description">
        <div class="product_category">
            @foreach($product->category()->get() as $category)
                <a href ='/shop/{{$category->slug}}' style="margin-right: 10px">{{$category->name}}</a>
            @endforeach
        </div>
        <div class="product_name">{{$product->name}}</div>
        <div class="product_text"><p>{{$product->description ?? 'Описание скоро будет'}}</p></div>
        <div class="order_info d-flex flex-row">
            {{-- Add to Cart --}}
            @include('shop.single_product._add_to_cart')
        </div>
    </div>
</div>
