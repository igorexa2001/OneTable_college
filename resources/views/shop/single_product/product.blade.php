@extends('layout.master')

@section('title', $product->name)

@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset('css/product_styles.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/product_responsive.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/number_input.css')}}>

@endsection

@section('content')

    @include('shop.single_product.breadcrumbs')
	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				@include('shop.single_product.images')

				<!-- Description -->
                @include('shop.single_product.description')

            </div>
        </div>
    </div>

@endsection


@section('extraJs')
    <script src={{asset('js/product_custom.js')}}></script>
    <script src={{asset('js/add_to_cart.js')}}></script>
    <script src={{asset('js/add_to_wishlist.js')}}></script>


@endsection
