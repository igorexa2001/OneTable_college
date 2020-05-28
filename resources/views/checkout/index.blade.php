@extends('layout.master')

@section('title', 'Checkout')

@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset('css/contact_styles.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/contact_responsive.css')}}>
@endsection

@section('content')
    <div class="super_container">
        @include('checkout.breadcrumbs')

        <!-- Cart -->
        @include('checkout._checkout')

    </div>
@endsection

@section('extraJs')
@endsection
