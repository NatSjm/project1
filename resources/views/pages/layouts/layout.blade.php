<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

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

</body>
</html>
