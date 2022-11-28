@extends('layouts.v_main')

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
                    <span class="text-danger">{{ $errors->first('email') }}</span><br><br>
                @endif

                @if (session('pesan'))
                    <span class="text-success"><strong>SUKSES!</strong> <br>{{ session('pesan') }}</span><br><br>
                @endif

                <form role="form" action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <input class="form-control" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Email" placeholder="Email" autofocus required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <input class="form-control" id="password" name="password" value="{{ old('password') }}"
                                type="password" placeholder="Kata Sandi" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <button type="submit" class="btn" id="kirim">Kirim</button>
                        </div>
                    </div>

                </form>
                <br>
                <a href="{{ route('passwordForget') }}">Lupa Password</a> atau
                <a href="{{ route('register') }}">Buat Akun Baru</a>

            </div>

        </section>


    </main><!-- End #main -->
@endsection
