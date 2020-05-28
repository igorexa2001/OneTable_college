
<div class="cart_items">
    <ul class="cart_list">
        @foreach($cartItems as $cartItem)
            <li class="cart_item clearfix">
                <div id={{$cartItem->id}}>
                <div class="cart_item_image" >
                    @if($cartItem->associatedModel->productPicture->first() != null)
                        <img src={{ asset($cartItem->associatedModel->productPicture->first()->path_to_image) }} alt="">
                    @else
                        <img src={{ asset('images/products/product_null.png') }} alt="">
                    @endif
                </div>
                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                    <div class="cart_item_name cart_info_col">
                        <div class="cart_item_title">Name</div>
                        <div class="cart_item_text cart_item_name_text">
                            <a  href="/shop/product/{{$cartItem->associatedModel->slug}}"> {{$cartItem->name}} </a>
                        </div>
                    </div>
                    <div class="cart_item_quantity cart_info_col">
                        <div class="cart_item_title">Quantity</div>
{{--                        <div class="cart_item_text cart_item_quantity_{{$cartItem->id}}">{{$cartItem->quantity}}</div>--}}
                        <div class="cart_item_text" style="width: 100px">
                            <div class="input-group" style="height: 40px">
                                <input disabled class="form-control quantity-input" type="text" value="{{$cartItem->quantity}}" id="{{$cartItem->id}}-input" style="background-color: white"/>
                                <div class="input-group-append">
                                    <div class="btn-group-vertical" style="height: 40px">
                                    <button class="btn btn-quantity-change btn-light" type="button" id="{{$cartItem->id}}" value="+1" >
                                        <i class="fas fa-chevron-up quantity_button_text"></i>
                                    </button>
                                    <button class="btn btn-light btn-quantity-change" type="button" id="{{$cartItem->id}}" value="-1" style="width:30px; height: 20px; padding: 0">
                                        <i class="fas fa-chevron-down quantity_button_text"></i>
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div>--}}
{{--                        <div class="cart_info_col">--}}
{{--                            <div class="cart_item_text"><button class="quantity_inc" value={{$cartItem->id}}>+</button></div>--}}
{{--                            <div class="cart_item_text"><button class="quantity_dec" value={{$cartItem->id}}>-</button></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="cart_item_price cart_info_col">
                        <div class="cart_item_title">Price</div>
                        <div class="cart_item_text">${{$cartItem->price}}</div>
                    </div>
                    <div class="cart_item_total cart_info_col" style="width: 100px">
                        <div class="cart_item_title">Total</div>
                        <div class="cart_item_text cart_item_total_{{$cartItem->id}}">${{$cartItem->getPriceSum()}}</div>
                    </div>

                    <div class="cart_item_total">
                        {{ Form::open(['route' => ['delete_from_cart', 'id' => $cartItem->id], 'method' => 'delete']) }}
                            <div class="cart_item_title"></div>
                            <div class="cart_item_text" style="padding-top: 15px">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
