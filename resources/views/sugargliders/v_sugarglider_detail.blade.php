@extends('layouts.v_main')

@section('title')
    Detail Sugar Glider
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Database Sugar Glider</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('sugargliders') }}">Koleksi</a></li>
                        <li>{{ $sugarglider->kode }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                Kode : {{ $sugarglider->kode }}<br>
                Nama : {{ $sugarglider->nama }}<br>
                Kelamin :
                @if ($sugarglider->kelamin == '0')
                    Betina
                @else
                    Jantan
                @endif
                <br>
                OOP : {{ $sugarglider->oop }}<br>
                Usia :
                {{ Carbon\Carbon::parse($sugarglider->oop)->diff(Carbon\Carbon::now())->format('%y tahun %m bulan %d hari') }}<br>
                Warna : {{ $sugarglider->warna }}<br>
                Jenis : {{ $sugarglider->jenis }}<br>
                Genetika : {{ $sugarglider->genetika }}<br>
                Fenotype : {{ $sugarglider->fenotype }}<br>
                Indukan Betina : {{ $sugarglider->indukan_betina }}<br>
                Indukan Jantan : {{ $sugarglider->indukan_jantan }}<br>
                Gambar : {{ $sugarglider->gambar }}<br>
                Keterangan : {{ $sugarglider->keterangan }}<br>
                Kandang : {{ $sugarglider->sugarglider_shelter->nama }}<br>
                Adopsi :
                @if ($sugarglider->adopsi == '0')
                    Tidak Untuk Diadopsi
                @else
                    Terbuka
                @endif
            </div>

        </section>


    </main><!-- End #main -->
@endsection
