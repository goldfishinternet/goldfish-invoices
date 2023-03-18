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
</head>
<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="app">
        <header>
            <a class="" href="#">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </header>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <x-sidebar />
                </nav>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
                    @yield('content')
                </main>
                <x-footer />
            </div>
        </div>
    </div>

    <x-nav />

    @if(session('status'))
        <x-alert message="{{ session('status') }}" variant="indigo" role="alert" />
    @endif

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    @livewireScripts
    @yield('scripts')
    @stack('scripts')

    <script>
        function closeAlert(event){
            let element = event.target;
            while(element.nodeName !== "BUTTON"){
                element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }
    </script>
</body>
</html>
