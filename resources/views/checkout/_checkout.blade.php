{{Form::open(['route' => 'checkout_send', 'method' => 'post']) }}
<div class="row">
    <div class="col-md-5">
        <div style="padding: 50px" class="container">
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="inputEmail4" style="{{isset($errors->email) ? 'color : red':''}}">Email </label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress">Ваше имя</label>
                    <input type="text" class="form-control" id="inputName" name="name" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Город</label>
                    <input type="text" class="form-control" id="inputCity" name="city" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Район</label>
                    <input type="text" class="form-control" id="inputState" name="state" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="inputAddress">Адрес</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Индекс</label>
                    <input type="text" class="form-control" id="inputZip" name="zip" required>
                </div>
            </div>
            <div class="form-group">
                <label for="deliveryMethods">Способ доставки</label>
                <select id="deliveryMethods" class="form-control" name="deliveryMethod" style="margin: 0px">
                    @foreach($deliveryMethods as $deliveryMethod)
                        @if($deliveryMethod->first)
                            <option selected>{{$deliveryMethod->title}}</option>
                        @endif
                        <option>{{$deliveryMethod->title}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" value="{{app('cart')->getSubTotal()}}" name="full_price">
            <div style="display: flex; justify-content: space-between">
                <button type="submit" class="btn btn-primary">Подтвердить</button>
                <a href="{{route('cart')}}"> <button class="btn btn-light">Назад</button> </a>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div style="padding: 50px 50px 50px 0px" class="container">
            <table class="table table-sm" style="text-align: center;">
                <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td style="text-align: left">{{$cartItem->name}}</td>
                        <td>{{$cartItem->price.' ₽'}}</td>
                        <td>{{$cartItem->quantity}}</td>
                        <td>{{$cartItem->getPriceSum().' ₽'}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <th>Итого:</th>
                    <th>{{app('cart')->getSubTotal().' ₽'}}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{ Form::close() }}
