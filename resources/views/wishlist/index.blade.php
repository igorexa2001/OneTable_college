@extends('layout.master')

@section('title', 'Wishlist')

@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset('css/cart_styles.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/cart_responsive.css')}}>
@endsection

@section('content')
    <div class="super_container">

        <!-- Cart -->
        <div class="cart_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cart_container">
                            <div class="cart_title">Список желаемого</div>
                            {{--Wishlist Items--}}
                            @include('wishlist.wishlist_items')

                            <div class="cart_buttons">
                                <button type="button" class="button cart_button_clear">
                                    <a href="/wishlist/clear" style="color: black"> Очистить список</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('layout.modal_window.modal')
@endsection

@section('extraJs')
    <script src={{asset('js/cart_custom.js')}}></script>
    <script src={{asset('js/quantity_change.js')}}></script>
    <script src={{asset('js/add_to_cart.js')}}></script>
@endsection
