<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @section('title'){{ __('Home') }}@show</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" />
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/color-01.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        @yield('style')
    </head>
    <body>
        @include('partials.mobile-menu')

        @include('partials.header')

        @yield('content')

        @include('partials.footer')

        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('script')
    </body>
</html>