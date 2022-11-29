@extends('layouts.v_main')

@section('title')
    Tambah Data Pemilik
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Database Pemilik</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('owners') }}">Pemilik</a></li>
                        <li>Tambah Baru</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                <form role="form" action="{{ route('owner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="nama" class="">Nama</label>
                    <input class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama"
                        required><br>

                    <label for="alamat" class="">Alamat</label>
                    <input class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}"
                        placeholder="Alamat" required><br>

                    <label for="telp" class="">Telp</label>
                    <input class="form-control" id="telp" name="telp" value="{{ old('telp') }}" placeholder="Telp"
                        required><br>

                    <button type="submit" class="" id="kirim">Simpan</button>

                </form>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
