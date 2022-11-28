@extends('layouts.v_main')

@section('title')
    Ubah Kata Sandi
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
                        <li>Ubah Password</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container text-center">

                <div class="section-title">
                    <h2>Ubah Kata Sandi</h2>
                    <p>Silakan masukkan kata sandi baru yang Anda kehendaki.</p>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <span class="text-danger">{{ $err }}</span><br><br>
                    @endforeach
                @endif

                @if (session('pesan'))
                    <span class="text-success"><strong>SUKSES!</strong> <br>{{ session('pesan') }}</span><br><br>
                @endif

                <form role="form" action="{{ route('passwordChange') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <input class="form-control" id="password_new" name="password_new" type="password"
                                placeholder="Kata Sandi Baru" required><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <input class="form-control" id="password_new_confirmation" name="password_new_confirmation"
                                type="password" placeholder="Konfirmasi Kata Sandi" required><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-4 form-group">
                            <button type="submit" class="btn" id="kirim">Kirim</button>
                        </div>
                    </div>
                </form>

            </div>

        </section>


    </main><!-- End #main -->
@endsection
