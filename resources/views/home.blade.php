<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
{{--<body class="{{ $body_class }}">--}}

<body class="{{Request::route()->getName()}}">

{!! file_get_contents(asset('svg/sprite.svg')) !!}


<div id="app">
    <router-view :item="'Hello!'"></router-view>
    {{--<router-link to="/">Home</router-link>--}}
    {{--<router-link to="/orders">Orders</router-link>--}}
</div>


<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
