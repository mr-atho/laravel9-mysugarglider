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

        <section class="inner-page">
            <div class="container">
                Nama : {{ $shelter->nama }}<br>
                Alamat : {{ $shelter->kode }}<br>
                Alamat : {{ $shelter->alamat }}<br>
                Status : {{ $shelter->status }}<br>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
