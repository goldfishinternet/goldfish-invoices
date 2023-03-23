<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ trans('panel.site_title') }}</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @yield('styles')
    @livewireStyles
    <style>
        main > .container {
          padding: 60px 15px 0;
        }
    </style>
</head>
<body class="h-100">
    <div id="app" class="d-flex flex-column h-100">
        <header>
            <nav class="navbar navbar-dark bg-dark text-white" aria-label="">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <svg width="40px" height="40px" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                            <g transform="matrix(0.179104,0,0,0.179104,-78.1869,-9.8915)">
                                <clipPath id="_clip1">
                                    <circle cx="604.044" cy="222.728" r="167.5"/>
                                </clipPath>
                                <g clip-path="url(#_clip1)">
                                    <g transform="matrix(0.24,0,0,0.24,9,0)">
                                        <circle cx="2482.6" cy="928.031" r="697.917" style="fill:rgb(242,94,13);"/>
                                    </g>
                                    <g transform="matrix(0.805781,0,0,0.805781,81.8085,85.0086)">
                                        <path d="M797.606,145.162C801.413,123.31 732.184,43.325 684.456,16.475L678.511,18.371C698.833,76.567 673.14,146.55 608.712,191.762C538.07,241.761 444.13,245.339 382.746,204.811C387.456,262.934 408.557,327.639 446.608,376.173C446.608,376.173 334.777,384.125 260.37,367.234C203.995,354.419 87.343,320.08 0,254.625C0,254.625 143.732,393.44 297.62,428.266C451.512,463.093 551.396,460.407 655.649,388.105C758.207,317.058 817.467,211.683 802.286,195.524C787.108,179.34 740.813,190.111 716.755,181.616C716.755,181.616 793.774,167.013 797.606,145.162Z" style="fill:white;fill-rule:nonzero;"/>
                                    </g>
                                    <g transform="matrix(0.805781,0,0,0.805781,81.8085,85.0086)">
                                        <path d="M469.681,163.37C453.354,118.197 472.501,69.466 512.503,54.49C552.545,39.685 598.188,64.289 614.735,109.433C631.075,154.814 611.942,203.542 571.929,218.339C531.905,233.32 486.239,208.698 469.681,163.37Z" style="fill:white;"/>
                                    </g>
                                    <g transform="matrix(0.805781,0,0,0.805781,81.8085,85.0086)">
                                        <path d="M588.973,124.86L554.789,152.656L568.243,106.61C555.897,100.26 541.726,98.739 528.446,103.648C501.552,113.705 488.619,146.561 499.563,177.133C510.694,207.405 541.604,223.919 568.706,214.077C595.603,204.02 608.535,171.173 597.593,140.598C595.468,134.776 592.403,129.608 588.973,124.86Z" style="fill:rgb(39,28,8);fill-rule:nonzero;"/>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        Goldfish Invoices
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLightLabel">Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body d-flex align-items-stretch flex-column justify-content-between">
                            <x-sidebar />
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="flex-shrink-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 py-3">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    @livewireScripts
    @yield('scripts')
    @stack('scripts')
</body>
</html>
