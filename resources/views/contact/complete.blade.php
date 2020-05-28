@extends('layout.master')

@section('title', 'Complete')

@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset('css/main_styles.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/responsive.css')}}>
@endsection

@section('content')
    <div class="super_container">
        <div class="container" style="padding: 50px">
            <h2>Success</h2>
            <hr>
            <p>Your message is really important for us</p>
            <p>We will contact you later</p>
            <p>Thank you</p>
            <hr>
            <p>OneTable</p>
        </div>
    </div>
@endsection

@section('extraJs')
@endsection
