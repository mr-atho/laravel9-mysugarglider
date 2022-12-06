@extends('layouts.v_main')

@section('title')
    Beranda
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome <br>to Shelter</h1>
            <h2>
                Selamat datang di website kami. <br>
                Tempat dimana Sugar Glider berada.
            </h2>
            <a href="#about" class="btn-get-started scrollto">Mulai</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Kenapa <br>mySugarGlider.id?</h3>
                            <p>
                                Karena kami menyimpan data silsilah Sugar Glider Anda. Dengan data yang akurat, kita
                                dapat mendapatkan keturunan yang berkualitas.
                            </p>
                            <div class="text-center">
                                <a href="#" class="more-btn">Pelajari selengkapnya <i
                                        class="bx bx-chevron-right"></i></a>
                            </div>
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
                                            Kami mencatat silsilah indukan setiap Sugar Glider untuk mendapatkan jenis yang
                                            terbaik.
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
                                            Kami menawarkan berbagai jenis varian Sugar Glider yang terbaik
                                            dengan biaya adopsi yang terjangkau.
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
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count_sugargliders }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Koleksi <br>Sugar Glider</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="far fa-hospital"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count_shelters }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Kandang <br>yang dimiliki</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-flask"></i>
                            <span data-purecounter-start="0" data-purecounter-end=""
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Pemilik</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-award"></i>
                            <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Sugar Glider <br> yang telah diadopsi</p>
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
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-house-heart-fill"></i></div>
                                <h4><a href="">{{ $shelter->nama }}</a></h4>
                                <p>{{ $shelter->alamat }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row text-center">
                    <div class="col-md-4 offset-md-4 form-group">
                        <a href="{{ route('shelters') }}"><span class="btn">Selengkapnya</span></a>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->



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
                            <a href="{{ asset('assets/img/gallery/gallery-1.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/img/gallery/gallery-1.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/gallery-2.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/img/gallery/gallery-2.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/gallery-3.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/img/gallery/gallery-3.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/gallery-4.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/img/gallery/gallery-4.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/gallery-5.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/img/gallery/gallery-5.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/gallery-6.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/img/gallery/gallery-6.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/gallery-7.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/img/gallery/gallery-7.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/gallery-8.jpg') }}" class="galelry-lightbox">
                                <img src="{{ asset('assets/img/gallery/gallery-8.jpg') }}" alt=""
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
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d699.664251739492!2d112.75374525390211!3d-7.25236950706676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f922b9a9b25d%3A0x43da2b44b725a518!2sAthoRia%20Sugar%20Glider!5e0!3m2!1sen!2sid!4v1667538513741!5m2!1sen!2sid"
                    frameborder="0" allowfullscreen></iframe>


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
                                    <p>info@mysugarglider.id/p>
                                </div>

                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Telp:</h4>
                                    <p>+62 857 5533 3232</p>
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
