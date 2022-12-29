@extends('layouts.v_main')

@section('title')
    Detail Kandang
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Kandang</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('shelters') }}">Kandang</a></li>
                        <li>{{ $shelter->nama }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        @if ($shelter->gmaps)
            <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb={{ $shelter->gmaps }}" frameborder="0" allowfullscreen></iframe>
        @endif

        <section id="inner-page collection" class="collection" style="margin-top: -5em !important">
            <div class="container collection-wrap">
                <div class="collection-item">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            @if ($shelter->image)
                                <img src="{{ asset('/upload/shelters/' . $shelter->image) }}" class="collection-img"
                                    alt="{{ $shelter->nama }}">
                            @endif
                            <h2>{{ $shelter->nama }}</h2>
                            <h4>
                                {{ $shelter->user->profile->telp }} |
                                {{ $shelter->user->email }} |
                                {{ $shelter->alamat }}</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{ $shelter->keterangan }}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>

                            <h3>Koleksi</h3>
                            <ol>
                                @foreach ($sugargliders as $sugarglider)
                                    {{ ($sugargliders->currentPage() - 1) * $sugargliders->links('pagination::v_pagination')->paginator->perPage() + $loop->iteration }}.
                                    <a href="{{ route('sugarglider.show', $sugarglider->id) }}">
                                        {{ $sugarglider->nama }}
                                        ({{ $sugarglider->jenis }})
                                    </a>
                                    <br>
                                @endforeach

                            </ol>
                        </div>
                    </div>
                    <div class="card-footer mt-4">
                        {{ $sugargliders->links('pagination::v_pagination') }}
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
