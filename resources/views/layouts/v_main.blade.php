@include('layouts.v_header')

<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope"></i> <a href="mailto:mr.fightto@gmail.com<">mr.fightto@gmail.com</a>
                <i class="bi bi-phone"></i> +62 857 5533 3232
            </div>
            <div class="d-none d-lg-flex social-links align-items-center">
                <small>
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                        <a href="{{ route('logout') }}">KELUAR</a>
                    @else
                        <a href="{{ route('register') }}">DAFTAR</a>
                        <a href="{{ route('login') }}">MASUK</a>
                    @endif

                </small>
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
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
                            href="{{ route('home') }}">Beranda</a></li>
                    <li><a class="nav-link scrollto {{ request()->routeIs('sugargliders') ? 'active' : '' }}"
                            href="{{ route('sugargliders') }}">Koleksi</a></li>
                    <li><a class="nav-link scrollto {{ request()->routeIs('owners') ? 'active' : '' }}"
                            href="{{ route('owners') }}">Pemilik</a></li>
                    <li><a class="nav-link scrollto {{ request()->routeIs('shelters') ? 'active' : '' }}"
                            href="{{ route('shelters') }}">Kandang</a></li>
                    <li><a class="nav-link scrollto {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}#gallery">Galeri</a></li>
                    <li><a class="nav-link scrollto {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}#contact">Hubungi</a></li>
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
