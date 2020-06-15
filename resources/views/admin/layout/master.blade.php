@extends('voyager::master')
@section('content')
{{--    <link rel="stylesheet" type="text/css" href={{ asset('css/bootstrap4/bootstrap.min.css') }}>--}}
{{--    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">--}}
    @yield('styles')

    @yield('content_into')

    <script src={{ asset('js/jquery-3.3.1.min.js')}}></script>
    <script src={{ asset('css/bootstrap4/popper.js')}}></script>
    <script src={{ asset('css/bootstrap4/bootstrap.min.js')}}></script>
    <script src={{ asset('js/custom.js')}}></script>
    <script src={{asset('js/categories_hide.js')}}></script>
    @yield('extraJs')
@endsection
