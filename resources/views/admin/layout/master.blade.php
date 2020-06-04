<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title' ?? 'OneTable - АдминПанель')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTable shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/png">
    <link rel="stylesheet" type="text/css" href={{ asset('css/bootstrap4/bootstrap.min.css') }}>
    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">
    @yield('styles')
</head>

<body>

@include('admin.layout.navbar')

<main style="padding: 50px">
    <div style="text-align: center; margin-bottom: 30px">
        <h2>{{$title}}</h2>
    </div>
    @yield('content')
</main>

<script src={{ asset('js/jquery-3.3.1.min.js')}}></script>
<script src={{ asset('css/bootstrap4/popper.js')}}></script>
<script src={{ asset('css/bootstrap4/bootstrap.min.js')}}></script>
<script src={{ asset('js/custom.js')}}></script>
<script src={{asset('js/categories_hide.js')}}></script>
@yield('extraJs')

</body>

</html>
