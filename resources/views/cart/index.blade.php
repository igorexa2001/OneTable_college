@extends('layout.master')

@section('title', 'Cart')

@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset('css/bootstrap4/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{asset('css/cart_styles.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/cart_responsive.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/cart_items_styles.css')}}>
@endsection

@section('content')
    <div class="super_container">

        <!-- Cart -->
        <div class="cart_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cart_container">
                            <div class="cart_title">Shopping Cart</div>

                            @if($cartItems->isEmpty())
                                <div class="empty-cart" style="text-align: center"> Cart is empty </div>
                            @else
                                {{--Cart Items--}}
                                @include('cart.cart_items')
                            <!-- Order Total -->
                                <div class="order_total">
                                    <div class="order_total_content text-md-right">
                                        <div class="order_total_title">Order Total:</div>
                                        <div class="order_total_amount">${{app('cart')->getTotal()}}</div>
                                    </div>
                                </div>

                                <div class="cart_buttons">
                                    <a href='{{route('cart_clear')}}' style="margin: -10px">
                                        <button type="button" class="button cart_button_clear">
                                            Clear Cart
                                        </button>
                                    </a>
                                    <a href={{route('checkout_index')}}>
                                        <button type="submit" class="button cart_button_checkout" {{app('cart')->getContent()->isEmpty() ? 'disabled' : ''}}>
                                            Сheckout
                                        </button>
                                    </a>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('extraJs')
    <script src={{asset('js/cart_custom.js')}}></script>
    <script src={{asset('js/quantity_change.js')}}></script>
@endsection
