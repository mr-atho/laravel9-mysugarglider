@extends('layouts.v_main')

@section('title')
    Edit Data Pemilik
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
                <form role="form" action="{{ route('ownerUpdate', $owner->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="_method" value="PUT">

                    <label for="nama" class="">Nama</label>
                    <input class="form-control" id="nama" name="nama" value="{{ $owner->nama }}"
                        placeholder="Nama" required><br>

                    <label for="alamat" class="">Alamat</label>
                    <input class="form-control" id="alamat" name="alamat" value="{{ $owner->alamat }}"
                        placeholder="Alamat" required><br>

                    <label for="telp" class="">Telp</label>
                    <input class="form-control" id="telp" name="telp" value="{{ $owner->telp }}"
                        placeholder="telp" required><br>

                    <button type="submit" class="" id="kirim">Simpan</button>

                </form>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
