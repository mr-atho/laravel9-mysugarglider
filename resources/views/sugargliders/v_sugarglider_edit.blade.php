@extends('layouts.v_main')

@section('title')
    Edit Data Sugar Glider
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
                <form role="form" action="{{ route('sugargliderUpdate', $sugarglider->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="_method" value="PUT">

                    <label for="kode" class="">Kode</label>
                    <input class="form-control" id="kode" name="kode" value="{{ $sugarglider->kode }}"
                        placeholder="Kode" required><br>

                    <label for="nama" class="">Nama</label>
                    <input class="form-control" id="nama" name="nama" value="{{ $sugarglider->nama }}"
                        placeholder="Nama" required><br>

                    <label for="kelamin" class="">Kelamin</label>
                    <select class="form-control" id="kelamin" name="kelamin" value="{{ $sugarglider->kelamin }}">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="0" @if ($sugarglider->kelamin == '0') {{ 'selected' }} @endif>Betina</option>
                        <option value="1" @if ($sugarglider->kelamin == '1') {{ 'selected' }} @endif>Jantan</option>
                    </select><br>

                    <label for="oop" class=""> OOP</label>
                    <input class="form-control" id="oop" name="oop" value="{{ $sugarglider->oop }}"
                        placeholder="TTTT/BB/HH" required><br>

                    <label for="warna" class="">Warna</label>
                    <input class="form-control" id="warna" name="warna" value="{{ $sugarglider->warna }}"
                        placeholder="Warna" required><br>

                    <label for="jenis" class="">Jenis</label>
                    <input class="form-control" id="jenis" name="jenis" value="{{ $sugarglider->jenis }}"
                        placeholder="Jenis" required><br>

                    <label for="genetika" class="">Genetika </label>
                    <input class="form-control" id="genetika" name="genetika" value="{{ $sugarglider->genetika }}"
                        placeholder="Genetika"><br>

                    <label for="fenotype" class="">Fenotype</label>
                    <input class="form-control" id="fenotype" name="fenotype" value="{{ $sugarglider->fenotype }}"
                        placeholder="Fenotype" required><br>

                    <label for="indukan_betina" class="">Indukan Betina</label>
                    <input class="form-control" id="indukan_betina" name="indukan_betina"
                        value="{{ $sugarglider->indukan_betina }}" placeholder="Indukan Betina " required><br>

                    <label for="indukan_jantan" class="">Indukan Jantan</label>
                    <input class="form-control" id="indukan_jantan" name="indukan_jantan"
                        value="{{ $sugarglider->indukan_jantan }}" placeholder="Indukan Jantan" required><br>

                    <label for="gambar" class="">Gambar</label>
                    <input class="form-control" id="gambar" name="gambar" value="{{ $sugarglider->gambar }}"
                        placeholder="Gambar"><br>

                    <label for="keterangan" class="">Keterangan</label>
                    <input class="form-control" id="keterangan" name="keterangan" value="{{ $sugarglider->keterangan }}"
                        placeholder="Keterangan"><br>

                    <label for="adopsi" class="">Adopsi</label>
                    <select class="form-control" id="adopsi" name="adopsi" value="{{ $sugarglider->adopsi }}">
                        <option value="">Pilih Apakah Bisa Diadopsi</option>
                        <option value="0" @if ($sugarglider->adopsi == '0') {{ 'selected' }} @endif>Tidak Untuk
                            Diadopsi
                        </option>
                        <option value="1" @if ($sugarglider->adopsi == '1') {{ 'selected' }} @endif>Terbuka
                        </option>
                    </select><br>

                    <button type="submit" class="" id="kirim">Simpan</button>

                </form>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
