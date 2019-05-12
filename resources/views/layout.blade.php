<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    @if($slider)
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    @endif
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="{{ $body_class }}">

{!! file_get_contents(asset('svg/sprite.svg')) !!}

@section ('header')
    @include('sections.header.header_full_unauthorized.header_full_unauthorized')
@show

<div class="content-container">
    @yield('content')
</div>


@section ('footer')
    @include('sections.footer.footer_unauthorized.footer_unauthorized')
@show




@if($slider)

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>

@endif
@stack('scripts')

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
