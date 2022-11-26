@extends('layouts.v_main')

@section('title')
    Tambah Data Kandang
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Database Kandang</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('shelters') }}">Kandang</a></li>
                        <li>Tambah Baru</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                <form role="form" action="{{ route('shelterStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="nama" class="">Nama</label>
                    <input class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama"
                        required><br>

                    <label for="kode" class="">Kode</label>
                    <input class="form-control" id="kode" name="kode" value="{{ old('kode') }}" placeholder="Kode"
                        required><br>

                    <label for="alamat" class="">Alamat</label>
                    <input class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}"
                        placeholder="Alamat" required><br>

                    <label for="status" class="">Status</label>
                    <select class="form-control" id="status" name="status" value="{{ old('status') }}">
                        <option value="">Pilih Status</option>
                        <option value="1" @if (old('status') == '1') {{ 'selected' }} @endif>Buka
                        </option>
                        <option value="0" @if (old('status') == '0') {{ 'selected' }} @endif>Tutup
                        </option>
                    </select><br>

                    <button type="submit" class="" id="kirim">Simpan</button>

                </form>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
