@extends('layouts.v_main')

@section('title')
    Daftar Akun Baru
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Pengguna</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Daftar Akun Baru</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container text-center">

                <div class="section-title">
                    <h2>Buat Akun Baru</h2>
                    <p>Masukkan data Anda.</p>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <span class="text-danger">{{ $err }}</span><br><br>
                    @endforeach
                @endif

                <form role="form" action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <input class="form-control" id="nama" name="nama" value="{{ old('nama') }}"
                                placeholder="Nama" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <input class="form-control" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Email" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <input class="form-control" id="password" name="password" type="password"
                                placeholder="Kata Sandi" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <input class="form-control" id="password_konfirmasi" name="password_konfirmasi" type="password"
                                placeholder="Konfirmasi Kata Sandi" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <button type="submit" class="btn" id="kirim">Kirim</button>
                        </div>
                    </div>

                </form>
                <br>
                <a href="{{ route('login') }}">Sudah memiliki akun?</a>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
