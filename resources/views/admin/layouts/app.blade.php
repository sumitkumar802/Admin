<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!--   from new admi dash start   -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
        <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link id="pagestyle" href="{{ asset('admin/css/material-dashboard.min.css') }}" rel="stylesheet" />
        <style>
            .async-hide {
            opacity: 0 !important
            }
        </style>
        <script>
            (function(a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.start = 1 * new Date;
            h.end = i = function() {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function() {
                i();
                h.end = null
            }, c);
            h.timeout = c;
            })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
            'GTM-K9BGS8K': true
            });
        </script>
        <script>
            (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-46172202-22', 'auto', {
            allowLinker: true
            });
            ga('set', 'anonymizeIp', true);
            ga('require', 'GTM-K9BGS8K');
            ga('require', 'displayfeatures');
            ga('require', 'linker');
            ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
        </script>
        <!-- from new admin end -->
    </head>
    <body class="g-sidenav-show  bg-gray-100">
        <!-- sidenavbar add here -->
        @include('admin.layouts.sidebar')
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

            @include('admin.layouts.navigation')


            
            <div class="container-fluid py-2">
                @yield('content')
            </div>
        </main>


        <!--   Core JS Files   -->
        <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}"></script>
      

        @stack('scripts')

        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>

        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <script src="{{ asset('admin/js/material-dashboard.min.js') }}"></script>
    </body>
</html>
