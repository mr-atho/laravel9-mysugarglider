@extends('layouts.v_main')

@push('meta')
    <meta name="description"
        content="Kenapa MySugarGlider.id? Karena kami menyimpan data silsilah Sugar GLider Anda. Dengan data yang akurat, Anda bisa mendapatkan keturunan yang berkualitas.">
@endpush

@section('title')
    Tentang
@endsection

@push('styles')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 2px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
@endpush

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Tentang</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Tentang</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page about" id="about">
            <div class="container">
                <div class="container-fluid">
                    <div class="row">
                        <div
                            class="col-xl-3 col-lg-3 video-box d-flex justify-content-center align-items-stretch position-relative">
                        </div>

                        <div
                            class="col-xl-9 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                            <h3>Karena Sugar Glider Anda begitu penting..</h3>
                            <p>
                                <a href="{{ route('home') }}">MySugarGlider.id</a> didirikan pada Desember 2022. Dimulai
                                dari beberapa koleksi Sugar Glider sebagai hobi dan berkembang menjadi kecintaan pada
                                peliharaan ini agar mendapatkan perawatan terbaik supaya mendapatkan keturuan yang terbaik
                                pula. Maka dikembangkanlah aplikasi ini sebagai wadah bagi para pencinta, pemilik dan
                                peternak Sugar Glider dalam menyimpan data silsilah dari Sugar Glider yang diadopsi.
                                Tentunya dengan mengetahui silsilah secara akurat dari Sugar Glider, pemilik atau peternak
                                dapat mendapatkan keturunan Sugar Glider yang berkualitas. Dengan minimnya pencatatan
                                silsilah yang baik, semoga aplikasi ini dapat memberikan solusi bagi pemilik ataupun
                                peternak Sugar Glider di Indonesia.
                            </p>
                            <p>
                                Dengan saling berbagi informasi dan pengalaman, semoga para pencinta, pemilik dan peternak
                                mendapatkan tambahan pengetahuan dalam memelihara, merawat dan membesarkan Sugar Glider
                                masing-masing.
                            </p>
                            <p>
                                Salam lestari Sugar Glider!
                            </p>

                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-diagram-3"></i></div>
                                <h4 class="title"><a href="">Silsilah</a></h4>
                                <p class="description">Kami mencatat silsilah indukan setiap Sugar Glider untuk mendapatkan
                                    keturunan yang terbaik.</p>
                            </div>

                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-gem"></i></div>
                                <h4 class="title"><a href="">Kualitas</a></h4>
                                <p class="description">Kami memastikan bahwa Sugar Glider kami mendapatkan perhatian
                                    terbaik.</p>
                            </div>

                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-cash"></i></div>
                                <h4 class="title"><a href="">Biaya</a></h4>
                                <p class="description">Kami menawarkan berbagai jenis varian Sugar Glider yang terbaik dari
                                    peternak terbaik dengan biaya adopsi yang terjangkau.</p>
                            </div>

                            <div class="col-xl-3 col-lg-3 mt-5">
                                @if (Auth::user())
                                    <a href="{{ route('dashboard.index') }}" class="appointment-btn scrollto">
                                        <span class="d-none d-md-inline">Masuk</span> Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="appointment-btn scrollto">
                                        <span class="d-none d-md-inline">Mulai</span> Bergabung
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
