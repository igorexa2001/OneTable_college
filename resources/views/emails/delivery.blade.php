<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
    Your delivery:
    <p>{{$deliveryData->email}}</p>
    <p>{{$deliveryData->address1}}</p>
    <p>{{$deliveryData->address2}}</p>
    <p>{{$deliveryData->city}}</p>
    <p>{{$deliveryData->state}}</p>
    <p>{{$deliveryData->zip}}</p>
    <ul>
        @foreach($deliveryData->product()->get() as $product)
            <li>{{$product->name}}</li>
        @endforeach
    </ul>
</body>
</html>
