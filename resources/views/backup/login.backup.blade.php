@extends('layouts.v_auth')

@section('title')
    Masuk
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
                        <li>Masuk</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container text-center">
                <div class="section-title">
                    <h2>Masuk</h2>
                    <p>Masukkan email dan kata sandi Anda.</p>
                </div>

                @if ($errors->has('email'))
                    <div class="alert alert-danger" role="alert">
                        <strong>GAGAL</strong><br>
                        {{ $errors->first('email') }}
                    </div>
                @endif

                @if (session('pesan'))
                    <div class="alert alert-success" role="alert">
                        <strong>SUKSES</strong><br>
                        {{ session('pesan') }}
                    </div>
                @endif

                <form role="form" action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-4 offset-md-4 form-floating mb-3">
                        <input class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Email" placeholder="Email" autofocus required>
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-4 offset-md-4 form-floating">
                        <input class="form-control" id="password" name="password" value="{{ old('password') }}"
                            type="password" placeholder="Kata Sandi" required>
                        <label for="password">Kata Sandi</label>
                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <button type="submit" class="btn" id="kirim">Kirim</button>
                        </div>
                    </div>

                </form>
                <br>
                <a href="{{ route('password.forget') }}">Lupa Password</a> atau
                <a href="{{ route('register') }}">Buat Akun Baru</a>

            </div>

        </section>


    </main><!-- End #main -->
@endsection
