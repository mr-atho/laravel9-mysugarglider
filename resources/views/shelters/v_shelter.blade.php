@extends('layouts.v_main')

@push('meta')
    <meta name="description"
        content="Daftar kandang yang sudah bergabung dengan MySugarGlider.id. Apakah Anda sudah tergabung?">
@endpush

@section('title')
    Kandang
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
                        <li>Kandang</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page shelters" id="shelters">
            <div class="container">

                <div class="row">
                    @foreach ($shelters as $shelter)
                        <div class="col-lg-6 mt-4 mt-lg-4 mb-1">
                            <div class="member d-flex align-items-start">
                                <div class="pic"><img src="{{ asset('/upload/shelters/' . $shelter->image) }}"
                                        class="img-fluid" alt=""></div>
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
                </div>

                <div class="card-footer mt-4">
                    {{ $shelters->links('pagination::v_pagination') }}
                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection
