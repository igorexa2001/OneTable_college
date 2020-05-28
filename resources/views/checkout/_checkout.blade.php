{{Form::open(['route' => 'checkout_send', 'method' => 'post']) }}
<div style="padding: 50px" class="container">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4" style="{{isset($errors->email) ? 'color : red':''}}">Email </label>
            <input type="email" class="form-control" id="inputEmail4" name="email" required>
        </div>
        <div class="form-group col-md-6">
            <label for="deliveryMethods">Delivery Method</label>
            <select id="deliveryMethods" class="form-control" name="deliveryMethod">
                @foreach($deliveryMethods as $deliveryMethod)
                    @if($deliveryMethod->first)
                        <option selected>{{$deliveryMethod->title}}</option>
                    @endif
                        <option>{{$deliveryMethod->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address1" required>
    </div>
    <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2" required>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" name="city" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <input type="text" class="form-control" id="inputState" name="state" required>
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="zip" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Confirm</button>
</div>
{{ Form::close() }}
