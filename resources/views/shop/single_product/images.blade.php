<div class="col-lg-2 order-lg-1 order-2">
    <ul class="image_list">
        @foreach($product->productPicture as $picture)
            @if($picture)
                <li data-image={{$picture->path_to_image}}>
                    <img src={{$picture->path_to_image}} alt="">
                </li>
            @endif
        @endforeach
    </ul>
</div>

<!-- Selected Image -->
<div class="col-lg-5 order-lg-2 order-1">
    <div class="image_selected">
        <img src={{$product->productPicture->first()->path_to_image}} alt="">
    </div>
</div>
