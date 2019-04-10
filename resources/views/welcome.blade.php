<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/app.css') }}" rel= "stylesheet" type="text/css">

        <!-- Styles -->

    </head>
    <body>


  <h1 class="gydeline-cont headline headline-1">Gydeline</h1>

    @include('sections.color.colors')
    @include('sections.typo.typo')
    @include('sections.active-elements.active-elements')

  {!! file_get_contents(asset('svg/sprite.svg')) !!}
    @include('sections.popups.popups')
    @include('sections.product-edit.product-edit')
    @include('sections.menu-section.menu-section')
    @include('sections.footer-section.footer-section')
    @include('sections.pictogram-section.pictogram-section')

    </body>
</html>
