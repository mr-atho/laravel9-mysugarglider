<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @stack('meta')

    <title>@yield('title') - {{ config('app.name') }}</title>

    @stack('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/style-app.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style-app-dark.css') }}" type="text/css" />

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="image/png">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
</head>

<body>
    <script src="assets/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.v_backend_sidebar')
        </div>
        <div id="main" class="layout-navbar">
            <header class="mb-3">
                @include('layouts.v_backend_navbar')
            </header>

            <div id="main-content">
                <div class="page-heading">
                    @yield('content')
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2022-2023 &copy; MySugarGlider.id</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                    href="https://athoria.me">AthoRia.me</a></p>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>
