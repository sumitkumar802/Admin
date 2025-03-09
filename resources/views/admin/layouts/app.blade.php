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
        <script>
            var ctx = document.getElementById("chart-bars").getContext("2d");

            new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                label: "Views",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#43A047",
                data: [50, 45, 22, 28, 50, 60, 76],
                barThickness: 'flex'
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                legend: {
                    display: false,
                }
                },
                interaction: {
                intersect: false,
                mode: 'index',
                },
                scales: {
                y: {
                    grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: '#e5e5e5'
                    },
                    ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        lineHeight: 2
                    },
                    color: "#737373"
                    },
                },
                x: {
                    grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                    },
                    ticks: {
                    display: true,
                    color: '#737373',
                    padding: 10,
                    font: {
                        size: 14,
                        lineHeight: 2
                    },
                    }
                },
                },
            },
            });


            var ctx2 = document.getElementById("chart-line").getContext("2d");

            new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                datasets: [{
                label: "Sales",
                tension: 0,
                borderWidth: 2,
                pointRadius: 3,
                pointBackgroundColor: "#43A047",
                pointBorderColor: "transparent",
                borderColor: "#43A047",
                backgroundColor: "transparent",
                fill: true,
                data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
                maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    callbacks: {
                    title: function(context) {
                        const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                        return fullMonths[context[0].dataIndex];
                    }
                    }
                }
                },
                interaction: {
                intersect: false,
                mode: 'index',
                },
                scales: {
                y: {
                    grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [4, 4],
                    color: '#e5e5e5'
                    },
                    ticks: {
                    display: true,
                    color: '#737373',
                    padding: 10,
                    font: {
                        size: 12,
                        lineHeight: 2
                    },
                    }
                },
                x: {
                    grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                    },
                    ticks: {
                    display: true,
                    color: '#737373',
                    padding: 10,
                    font: {
                        size: 12,
                        lineHeight: 2
                    },
                    }
                },
                },
            },
            });

            var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

            new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                label: "Tasks",
                tension: 0,
                borderWidth: 2,
                pointRadius: 3,
                pointBackgroundColor: "#43A047",
                pointBorderColor: "transparent",
                borderColor: "#43A047",
                backgroundColor: "transparent",
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                legend: {
                    display: false,
                }
                },
                interaction: {
                intersect: false,
                mode: 'index',
                },
                scales: {
                y: {
                    grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [4, 4],
                    color: '#e5e5e5'
                    },
                    ticks: {
                    display: true,
                    padding: 10,
                    color: '#737373',
                    font: {
                        size: 14,
                        lineHeight: 2
                    },
                    }
                },
                x: {
                    grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [4, 4]
                    },
                    ticks: {
                    display: true,
                    color: '#737373',
                    padding: 10,
                    font: {
                        size: 14,
                        lineHeight: 2
                    },
                    }
                },
                },
            },
            });
        </script>
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
