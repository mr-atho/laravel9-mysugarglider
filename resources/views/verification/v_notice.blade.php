@extends('layouts.v_main')

@section('title')
    Verifikasi Email
@endsection

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Pengguna</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Verifikasi Email</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container text-center">
            <div class="section-title">
                <h2>Verifikasi Email</h2>
                <p>Sebelum melanjutkan, <br>
                    cek email Anda untuk memverifikasi email Anda terlebih dahulu atau <br>
                    tekan tombol dbawah ini untuk mendapatkan link aktivasi baru.</p>
            </div>

            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span><br><br>
            @endif

            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    Link verifikasi yang baru telah dikirim ke email Anda.
                </div>
            @endif

            <form role="form" action="{{ route('verification.resend') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-4 offset-md-4 form-group">
                        <button type="submit" class="btn" id="kirim">Kirim Link Baru</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
@endsection
