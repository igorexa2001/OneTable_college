@extends('voyager::master')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-ship"></i> Доставка №{{$delivery->id}}
        </h1>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="t-align-center">
                    <h3>Подробности заказа:</h3>
                </div>
                <table class="table">
                    <tbody>
                    <tr>
                        <th scope="row">Имя заказчика</th>
                        <td>{{$delivery->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email заказчика</th>
                        <td>{{$delivery->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Индекс заказчика</th>
                        <td>{{$delivery->zip}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Город заказчика</th>
                        <td>{{$delivery->city}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Район заказчика</th>
                        <td>{{$delivery->state}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Адрес заказчика</th>
                        <td>{{$delivery->address}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Способ доставки</th>
                        <td>{{$delivery->deliveryMethod->first()->title}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Статус заказа</th>
                        <td>{{$delivery->status}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Дата заказа</th>
                        <td>{{$delivery->created_at}}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="row ">
                    {{ Form::open(['route' => ['delete_delivery', $delivery],  'method' => 'delete']) }}
                    <button class="btn btn-danger" type="submit">Удалить заказ</button>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="col-xl-8">
                <div class="t-align-center">
                    <h3>Товары в заказе:</h3>
                </div>
                <table class="table t-align-center">
                    <thead>
                    <tr>
                        <th>id товара</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($delivery->product()->get() as $product)
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td class="t-align-left"><a href="{{route('oneProduct', [$product->slug])}}">{{$product->name}}</a></td>
                                <td>{{$product->price.' ₽'}}</td>
                                <td>{{$product->pivot->quantity}}</td>
                                <td>{{$product->price * $product->pivot->quantity.' ₽'}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th>доставка</th>
                            <td class="t-align-left">{{$delivery->deliveryMethod->first()->title}}</td>
                            <td></td>
                            <td></td>
                            <td>{{$delivery->deliveryMethod->first()->price.' ₽'}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="t-align-right font-weight-bold">Итого: </td>
                            <td class="font-weight-bold">{{$delivery->full_price.' ₽'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
