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
            <p>Ваш заказ принят в обработку</p>
            <p>Уникальный номер заказа - <b>{{$deliveryId}}</b></p>
            <p>Наш менеджер свяжется с вами для подтверждения</p>
            <p>Спасибо</p>
            <hr>
            <p>OneTable</p>
        </div>
    </div>
@endsection

@section('extraJs')
@endsection
