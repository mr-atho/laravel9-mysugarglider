@extends('layouts.v_main')

@section('title')
    Tambah Data Sugar Glider
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
                        <li>Tambah Baru</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                <form role="form" action="{{ route('sugargliderStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="kode" class="">Kode</label>
                    <input class="form-control" id="kode" name="kode" value="{{ old('kode') }}" placeholder="Kode"
                        required><br>

                    <label for="nama" class="">Nama</label>
                    <input class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama"
                        required><br>

                    <label for="kelamin" class="">Kelamin</label>
                    <select class="form-control" id="kelamin" name="kelamin" value="{{ old('kelamin') }}">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="0" @if (old('kelamin') == '0') {{ 'selected' }} @endif>Betina</option>
                        <option value="1" @if (old('kelamin') == '1') {{ 'selected' }} @endif>Jantan</option>
                    </select><br>

                    <label for="oop" class=""> OOP</label>
                    <input class="form-control" id="oop" name="oop" value="{{ old('oop') }}"
                        placeholder="TTTT/BB/HH" required><br>

                    <label for="warna" class="">Warna</label>
                    <input class="form-control" id="warna" name="warna" value="{{ old('warna') }}"
                        placeholder="Warna" required><br>

                    <label for="jenis" class="">Jenis</label>
                    <input class="form-control" id="jenis" name="jenis" value="{{ old('jenis') }}"
                        placeholder="Jenis" required><br>

                    <label for="genetika" class="">Genetika </label>
                    <input class="form-control" id="genetika" name="genetika" value="{{ old('genetika') }}"
                        placeholder="Genetika"><br>

                    <label for="fenotype" class="">Fenotype</label>
                    <input class="form-control" id="fenotype" name="fenotype" value="{{ old('fenotype') }}"
                        placeholder="Fenotype" required><br>

                    <label for="indukan_betina" class="">Indukan Betina</label>
                    <input class="form-control" id="indukan_betina" name="indukan_betina"
                        value="{{ old('indukan_betina') }}" placeholder="Indukan Betina " required><br>

                    <label for="indukan_jantan" class="">Indukan Jantan</label>
                    <input class="form-control" id="indukan_jantan" name="indukan_jantan"
                        value="{{ old('indukan_jantan') }}" placeholder="Indukan Jantan" required><br>

                    <label for="gambar" class="">Gambar</label>
                    <input class="form-control" id="gambar" name="gambar" value="{{ old('gambar') }}"
                        placeholder="Gambar"><br>

                    <label for="keterangan" class="">Keterangan</label>
                    <input class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}"
                        placeholder="Keterangan"><br>

                    <label for="adopsi" class="">Adopsi</label>
                    <select class="form-control" id="adopsi" name="adopsi" value="{{ old('adopsi') }}">
                        <option value="">Pilih Apakah Bisa Diadopsi</option>
                        <option value="0" @if (old('adopsi') == '0') {{ 'selected' }} @endif>Tidak Untuk
                            Diadopsi
                        </option>
                        <option value="1" @if (old('adopsi') == '1') {{ 'selected' }} @endif>Terbuka
                        </option>
                    </select><br>

                    <button type="submit" class="" id="kirim">Simpan</button>

                </form>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
