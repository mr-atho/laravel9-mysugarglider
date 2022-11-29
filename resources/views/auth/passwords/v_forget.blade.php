@extends('layouts.v_main')

@section('title')
    Lupa Kata Sandi
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
                        <li>Lupa Kata Sandi</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container text-center">
                <div class="section-title">
                    <h2>Temukan Akun Anda</h2>
                    <p>Masukkan email Anda untuk mencari akun Anda.</p>
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

                <form role="form" action="{{ route('password.link') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-4 offset-md-4 form-floating mb-3">
                        <input class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Email" placeholder="Email" autofocus required>
                        <label for="floatingInput">Email</label>
                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <button type="submit" class="btn" id="kirim">Kirim Link</button>
                        </div>
                    </div>

                </form>
                <br>
                <a href="{{ route('login') }}">Masuk</a> atau
                <a href="{{ route('register') }}">Buat Akun Baru</a>

            </div>

        </section>


    </main><!-- End #main -->
@endsection
