@extends('layouts.v_main')

@push('meta')
    <meta name="description"
        content="Selamat datang di MySugarGlider.id, situs yang menyediakan database lengkap tentang hewan Sugar Glider di Indonesia. Temukan data silsilah, cara merawat, habitat dan kebiasaan hidup sugar glider, serta komunitas pecinta sugar glider di Indonesia. Dapatkan juga tips dan trik dalam merawat sugar glider, serta informasi tentang jenis-jenis sugar glider yang ada di Indonesia. Kunjungi situs kami sekarang untuk mengetahui lebih lanjut tentang sugar glider di Indonesia.">
@endpush

@section('title')
    Database Sugar Glider Indonesia
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome <br>to Shelter</h1>
            <h2>
                Selamat datang di website<br>
                database Sugar Glider di Indonesia. <br>
                Tempat dimana data<br>
                Sugar Glider Anda berada.
            </h2>
            <a href="#about-us" class="btn-get-started scrollto">Mulai</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Home About Section ======= -->
        <section id="about-us" class="about-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Kenapa <br>MySugarGlider.id?</h3>
                            <p>
                                Karena kami menyimpan data Sugar Glider Anda. Dengan data yang akurat, kita
                                bisa mendapatkan keturunan yang berkualitas.
                            </p>
                            <small>
                                <div class="text-center">
                                    <a href="{{ route('about') }}" class="more-btn">
                                        <span class="d-none d-md-inline">{{ __('text.more') }}</span>
                                    </a>
                                </div>
                            </small>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bi bi-diagram-3"></i>
                                        <h4>Silsilah</h4>
                                        <p>
                                            Kami mencatat silsilah indukan setiap Sugar Glider untuk mendapatkan keturunan
                                            yang terbaik.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bi bi-gem"></i>
                                        <h4>Kualitas</h4>
                                        <p>
                                            Kami memastikan bahwa Sugar Glider kami mendapatkan perhatian terbaik.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bi bi-cash"></i>
                                        <h4>Biaya</h4>
                                        <p>
                                            Kami menawarkan berbagai jenis varian Sugar Glider yang terbaik dari peternak
                                            terbaik dengan biaya adopsi yang terjangkau.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="fas fa-user-md"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count_collections }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <a href="{{ route('collections') }}">
                                <p>Koleksi <br>Sugar Glider</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="far fa-hospital"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count_shelters }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <a href="{{ route('shelters') }}">
                                <p>Kandang <br>yang dimiliki</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-flask"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count_users }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Pengguna<br>Aplikasi</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-award"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count_adoptions }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Sugar Glider <br> yang dapat diadopsi</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Shelter Section ======= -->
        <section id="shelters" class="shelters">
            <div class="container">
                <div class="section-title">
                    <h2>Kandang</h2>
                    <p>Telusuri setiap kandang untuk melihat koleksi Sugar Glider yang dimiliki.</p>
                </div>

                <div class="row">
                    @foreach ($shelters as $shelter)
                        <div class="col-lg-6 mt-4 mt-lg-4 mb-1">
                            <div class="member d-flex align-items-start">
                                <div class="pic"><img src="{{ asset('/upload/shelters/' . $shelter->image) }}"
                                        class="img-fluid" alt="{{ $shelter->nama }}"></div>
                                <div class="member-info">
                                    <a href="{{ route('shelters') }}/{{ $shelter->id }}">
                                        <h4>{{ $shelter->nama }}</h4>
                                    </a>
                                    <span>{{ $shelter->alamat }}</span>
                                    <p>{{ $shelter->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row text-center">
                        <div class="col-md-4 offset-md-4 form-group">
                            <a href="{{ route('shelters') }}"><span class="btn">Selengkapnya</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Shelter Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title">
                    <h2>Foto Galeri</h2>
                    <p>Foto Sugar Glider di kandang kami.</p>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/images/gallery/gallery-1.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/images/gallery/gallery-1.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/images/gallery/gallery-2.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/images/gallery/gallery-2.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/images/gallery/gallery-3.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/images/gallery/gallery-3.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/images/gallery/gallery-4.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/images/gallery/gallery-4.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/images/gallery/gallery-5.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/images/gallery/gallery-5.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/images/gallery/gallery-6.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/images/gallery/gallery-6.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/images/gallery/gallery-7.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/images/gallery/gallery-7.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/images/gallery/gallery-8.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/images/gallery/gallery-8.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Gallery Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Hubungi</h2>
                    <p>Jangan ragu untuk menghubungi kami apabila Anda mempunyai pertanyaan seputar Sugar Glider atau ingin
                        berkunjung ke tempat kami.</p>
                </div>
            </div>

            <div>
                <div class="container">
                    <div class="row mt-5">

                        <div class="col-lg-4">
                            <div class="info">
                                <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Lokasi:</h4>
                                    <p>Kota Surabaya, Jawa Timur</p>
                                </div>

                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p><a href="mailto:info@mysugarglider.id">info@mysugarglider.id</a></p>
                                </div>

                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Chat WA:</h4>
                                    <p>
                                        <a aria-label="Chat on WhatsApp" href="https://wa.me/6285755333232"
                                            target="_blank">
                                            +62 857 5533 3232
                                        </a>
                                    </p>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-8 mt-5 mt-lg-0">

                            @if (session('pesan'))
                                <div class="alert alert-success" role="alert">
                                    <strong>SUKSES</strong><br>
                                    {{ session('pesan') }}
                                </div>
                            @endif

                            <form role="form" action="{{ route('contact.post') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <div class="form-floating">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Nama" required>
                                            <label for="name">{{ __('text.name') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0 form-floating">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email" required>
                                            <label for="email">{{ __('text.email') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3 form-floating">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subjek" required>
                                    <label for="subject">{{ __('text.subject') }}</label>
                                </div>

                                <div class="form-group mt-3 form-floating">
                                    <textarea class="form-control" name="messages" id="messages" rows="5" placeholder="Pesan"
                                        style="height: 150px" required></textarea>
                                    <label for="messages">{{ __('text.messages') }}</label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn">{{ __('text.send_message') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
