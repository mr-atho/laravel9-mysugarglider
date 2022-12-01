@include('layouts.v_header')

<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex social-links align-items-center">
                <a href="https://www.instagram.com/mysugarglider.id/" class="instagram" name="Instagram"><i
                        class="bi bi-instagram"></i></a>
                <i class="bi bi-envelope"></i> <a href="mailto:info@mysugarglider.id<">info@mysugarglider.id</a>
                <i class="bi bi-phone"></i> +62 857 5533 3232
            </div>
            <div class="d-none d-lg-flex social-links align-items-center text-uppercase">
                <small>
                    @if (Auth::check())
                        <a href="{{ route('dashboard.index') }}">{{ Auth::user()->name }}</a>
                        <a href="{{ route('logout') }}">{{ __('text.logout') }}</a>
                    @else
                        <a href="{{ route('register') }}">{{ __('text.register') }}</a>
                        <a href="{{ route('login') }}">{{ __('text.login') }}</a>
                    @endif
                </small>

            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="{{ route('home') }}">MySugarGlider</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">{{ __('text.home') }}</a></li>
                    <li><a class="nav-link scrollto {{ request()->routeIs('sugargliders') ? 'active' : '' }}"
                            href="{{ route('sugargliders') }}">{{ __('text.collection') }}</a></li>
                    <li><a class="nav-link scrollto {{ request()->routeIs('owners') ? 'active' : '' }}"
                            href="{{ route('home') }}#owners">{{ __('text.owner') }}</a></li>
                    <li><a class="nav-link scrollto {{ request()->routeIs('shelters') ? 'active' : '' }}"
                            href="{{ route('home') }}#shelters">{{ __('text.shelter') }}</a></li>
                    <li><a class="nav-link scrollto {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}#gallery">{{ __('text.gallery') }}</a></li>
                    <li><a class="nav-link scrollto {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}#contact">{{ __('text.contact') }}</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="#appointment" class="appointment-btn scrollto">
                <span class="d-none d-md-inline">Mulai</span> Adopsi
            </a>

        </div>
    </header><!-- End Header -->



    @yield('content')
    @stack('modals')
    @stack('scripts')
</body>

@include('layouts.v_footer')
