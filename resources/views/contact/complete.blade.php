@extends('layout.master')

@section('title', 'Complete')

@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset('css/main_styles.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/responsive.css')}}>
@endsection

@section('content')
    <div class="super_container">
        <div class="container" style="padding: 50px">
            <h2>Удачно</h2>
            <hr>
            <p>Ваше сообщение очень важно для нас</p>
            <p>Скоро с вами свяжутся наши специалисты</p>
            <p>Спасибо за отклик</p>
            <hr>
            <p>OneTable</p>
        </div>
    </div>
@endsection

@section('extraJs')
@endsection
