@extends('layouts.v_main')

@section('title')
    Profil
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
                        <li>Profil</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">

                <div class="section-title">
                    <h2>{{ $user->name }}</h2>
                    <p>Data akun Anda</p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Kata Sandi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row gy-1">
                                    <div class="col-lg-12 details order-2 order-lg-1">
                                        <h3>Profil</h3>
                                        <p class="fst-italic">Perbaharui data Anda.</p><br>
                                    </div>
                                    <div class="col-lg-12 order-1 order-lg-2">
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $err)
                                                <span class="text-danger">{{ $err }}</span><br><br>
                                            @endforeach
                                        @endif

                                        @if (session('pesan_profile'))
                                            <span class="text-success"><strong>SUKSES!</strong>
                                                <br>{{ session('pesan') }}</span><br><br>
                                        @endif

                                        <form role="form" action="{{ route('profileUpdate') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <input class="form-control" id="nama" name="nama"
                                                        value="{{ $user->name }}" placeholder="Nama" required><br>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <input class="form-control" id="email" name="email"
                                                        value="{{ $user->email }}" placeholder="Email" required><br>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <button type="submit" class="btn" id="kirim">Kirim</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row gy-1">
                                    <div class="col-lg-12 details order-2 order-lg-1">
                                        <h3>Ubah Kata Sandi</h3>
                                        <p class="fst-italic">Silakan masukkan kata sandi baru yang Anda kehendaki.</p><br>
                                    </div>
                                    <div class="col-lg-12 order-1 order-lg-2">
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $err)
                                                <span class="text-danger">{{ $err }}</span><br><br>
                                            @endforeach
                                        @endif

                                        @if (session('pesan_password'))
                                            <span class="text-success"><strong>SUKSES!</strong>
                                                <br>{{ session('pesan') }}</span><br><br>
                                        @endif

                                        <form role="form" action="{{ route('passwordChange') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <input class="form-control" id="password_new" name="password_new"
                                                        type="password" placeholder="Kata Sandi Baru" required><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <input class="form-control" id="password_new_confirmation"
                                                        name="password_new_confirmation" type="password"
                                                        placeholder="Konfirmasi Kata Sandi" required><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <button type="submit" class="btn" id="kirim">Kirim</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
