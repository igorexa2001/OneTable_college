<div class="col-lg-2 order-lg-1 order-2">
    <ul class="image_list">

        @if ($product->productPicture)
            @foreach($product->productPicture as $picture)
                @if($picture)
                    <li data-image={{asset($picture->path_to_image)}}>
                        <img src={{asset($picture->path_to_image)}} alt="">
                    </li>
                @endif
            @endforeach
        @else
            <li data-image={{asset('images/products/product_null.png')}}>
                <img src={{asset('images/products/product_null.png')}} alt="">
            </li>
        @endif
    </ul>
</div>

<!-- Selected Image -->
<div class="col-lg-5 order-lg-2 order-1">
    <div class="image_selected">
        @if ($product->productPicture->isNotEmpty())
            <img src={{asset($product->productPicture->first()->path_to_image)}} alt="">
        @else
            <img src={{asset('images/products/product_null.png')}} alt="">
        @endif

    </div>
</div>
