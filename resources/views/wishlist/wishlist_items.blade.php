
<div class="cart_items">
    <ul class="cart_list">
        @foreach($wishlistItems as $wishlistItem)
            <li class="cart_item clearfix">
                <div class="cart_item_image">
                    @if($wishlistItem->associatedModel->productPicture->first() != null)
                        <img src={{ asset($wishlistItem->associatedModel->productPicture->first()->path_to_image) }} alt="">
                    @else
                        <img src={{ asset('images/products/product_null.png') }} alt="">
                    @endif
                </div>
                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                    <div class="cart_item_name cart_info_col" style="width: 250px">
                        <div class="cart_item_title"> Name</div>
                        <div class="cart_item_text">
                            <a href="/shop/product/{{$wishlistItem->associatedModel->slug}}"> {{$wishlistItem->name}}</a>
                        </div>
                    </div>

                    <div class="cart_item_name cart_info_col" style="color: white">
                        {{ Form::open(['route' => ['delete_from_wishlist_page', 'id' => $wishlistItem->id], 'method' => 'delete']) }}
                        	<button class="btn btn-danger" type="submit">delete</button>
                        {{ Form::close() }}
                    </div>
                    <div class="cart_info_col" style="color: white">
                        <button type="button" class="btn btn-success buy_button_single" value={{$wishlistItem->id}}>Buy</button>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
