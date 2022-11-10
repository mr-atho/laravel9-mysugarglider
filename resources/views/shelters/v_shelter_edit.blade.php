@extends('layouts.v_main')

@section('title')
    Edit Data Kandang
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
                <form role="form" action="{{ route('shelterUpdate', $shelter->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="_method" value="PUT">

                    <label for="nama" class="">Nama</label>
                    <input class="form-control" id="nama" name="nama" value="{{ $shelter->nama }}"
                        placeholder="Nama" required><br>

                    <label for="kode" class="">Kode</label>
                    <input class="form-control" id="kode" name="kode" value="{{ $shelter->kode }}"
                        placeholder="Kode" required><br>

                    <label for="alamat" class="">Alamat</label>
                    <input class="form-control" id="alamat" name="alamat" value="{{ $shelter->alamat }}"
                        placeholder="Alamat" required><br>

                    <label for="status" class="">Status</label>
                    <input class="form-control" id="status" name="status" value="{{ $shelter->status }}"
                        placeholder="status" required><br>

                    <button type="submit" class="" id="kirim">Simpan</button>

                </form>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
