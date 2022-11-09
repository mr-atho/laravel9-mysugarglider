@extends('layouts.v_main')

@section('title')
    Detail Pemilik
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Pemilik</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('owners') }}">Pemilik</a></li>
                        <li>{{ $owner->nama }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                Nama : {{ $owner->nama }}<br>
                Alamat : {{ $owner->alamat }}<br>
                Telp : {{ $owner->telp }}<br>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
