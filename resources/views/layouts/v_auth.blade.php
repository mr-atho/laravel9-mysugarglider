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

    <link rel="stylesheet" href="{{ asset('assets/css/style-auth.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style-app.css') }}" type="text/css" />

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/img/logo/logo.svg') }}"
                                alt="Logo"></a>
                    </div>

                    @yield('content')
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <picture class="picture">
                        <img itemprop="image" srcset="//picsum.photos/700/600/?random" alt="" class="h-100">
                    </picture>
                </div>
            </div>
        </div>
    </div>
    @stack('modals')
    @stack('scripts')
</body>

</html>
