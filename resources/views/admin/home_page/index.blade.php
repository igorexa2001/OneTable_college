@extends('voyager::master')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-ship"></i> Информация о доставках
        </h1>
    </div>
@stop

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Город</th>
                <th scope="col">Доставка</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($deliveryData as $delivery)
                    <tr>
                        <th scope="row">{{$delivery->id}}</th>
                        <td>{{$delivery->name}}</td>
                        <td>{{$delivery->email}}</td>
                        <td>{{$delivery->city}}</td>
                        <td>{{$delivery->deliveryMethod->first()->title}}</td>
                        <td>{{$delivery->full_price.' ₽'}}</td>
                        <td>{{$delivery->status}}</td>
                        <td><a href="{{route('show_delivery', [$delivery])}}">Подробнее</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
