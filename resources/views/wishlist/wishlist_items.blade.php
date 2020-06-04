
<div class="cart_items">
    <ul class="cart_list">
        @foreach($wishlistItems as $wishlistItem)
            <li class="cart_item clearfix">
                <div class="cart_item_image">
                    <img src={{ $wishlistItem->associatedModel->productPicture->first()->path_to_image }} alt="">
                </div>
                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                    <div class="cart_item_name cart_info_col" style="width: 250px">
                        <div class="cart_item_title"> Название</div>
                        <div class="cart_item_text">
                            <a href="/shop/product/{{$wishlistItem->associatedModel->slug}}"> {{$wishlistItem->name}}</a>
                        </div>
                    </div>

                    <div class="cart_item_name cart_info_col" style="color: white">
                        {{ Form::open(['route' => ['delete_from_wishlist_page', 'id' => $wishlistItem->id], 'method' => 'delete']) }}
                        	<button class="btn btn-danger" type="submit">Удалить</button>
                        {{ Form::close() }}
                    </div>
                    <div class="cart_info_col" style="color: white">
                        <button type="button" class="btn btn-success buy_button_single" value={{$wishlistItem->id}}>Купить</button>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
