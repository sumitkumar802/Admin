<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="favicon.png" />

        <meta name="description" content="" />
        <meta name="keywords" content="bootstrap, bootstrap5" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>

        <link rel="stylesheet" href="{{ asset('landing/fonts/icomoon/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('landing/fonts/flaticon/font/flaticon.css') }}" />

        <link rel="stylesheet" href="{{ asset('landing/css/tiny-slider.css') }}" />
        <link rel="stylesheet" href="{{ asset('landing/css/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}" />
    </head>
    <body>
        @include('landing.layouts.nav')
        @yield('content')
        <div class="site-footer">
            @include('landing.layouts.footer')
        </div>

        <!-- Preloader -->
        <div id="overlayer"></div>
        <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        </div>
        <script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('landing/js/tiny-slider.js') }}"></script>
        <script src="{{ asset('landing/js/aos.js') }}"></script>
        <script src="{{ asset('landing/js/navbar.js') }}"></script>
        <script src="{{ asset('landing/js/counter.js') }}"></script>
        <script src="{{ asset('landing/js/custom.js') }}"></script>
    </body>
</html>