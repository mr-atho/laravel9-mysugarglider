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

        <section id="inner-page collection" class="collection">
            <div class="container">
                <div class="collection-wrap">
                    <div class="collection-item">
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
                            <div class="card-footer mt-4">
                                {{ $sugargliders->links('pagination::v_pagination') }}
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
