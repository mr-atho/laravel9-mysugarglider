@extends('layouts.v_main')

@section('title')
    Dashboard Pengguna
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
                        <li>Dashboard</li>
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

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>GAGAL</strong><br>
                        @foreach ($errors->all() as $err)
                            {{ $err }}</span><br>
                        @endforeach
                    </div>
                @endif

                @if (session('pesan'))
                    <div class="alert alert-success" role="alert">
                        <strong>SUKSES</strong><br>
                        {{ session('pesan') }}
                    </div>
                @endif

                <div class="row gy-4">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Kata Sandi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row gy-1">
                                    <div class="col-lg-12 details order-2 order-lg-1">
                                        <h3>Dashboard</h3>
                                        <p class="fst-italic">Hanya pengguna yang telah terverifikasi yang dapat mengakses
                                            halaman ini</p><br>
                                    </div>
                                    <div class="col-lg-12 order-1 order-lg-2">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row gy-1">
                                    <div class="col-lg-12 details order-2 order-lg-1">
                                        <h3>Profil</h3>
                                        <p class="fst-italic">Perbaharui data Anda.</p><br>
                                    </div>
                                    <div class="col-lg-12 order-1 order-lg-2">
                                        <form role="form" action="{{ route('dashboard.profile.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="col-md-6 form-floating mb-3">
                                                <input class="form-control" id="nama" name="nama"
                                                    value="{{ $user->name }}" placeholder="Nama" required>
                                                <label for="floatingInput">Nama</label>
                                            </div>

                                            <div class="col-md-6 form-floating mb-3">
                                                <input class="form-control" id="email" name="email"
                                                    value="{{ $user->email }}" placeholder="Email" required>
                                                <label for="floatingInput">Email</label>
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
                            <div class="tab-pane" id="tab-3">
                                <div class="row gy-1">
                                    <div class="col-lg-12 details order-2 order-lg-1">
                                        <h3>Ubah Kata Sandi</h3>
                                        <p class="fst-italic">Silakan masukkan kata sandi baru yang Anda kehendaki.</p><br>
                                    </div>
                                    <div class="col-lg-12 order-1 order-lg-2">
                                        <form role="form" action="{{ route('dashboard.password.change') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="col-md-6 form-floating mb-3">
                                                <input class="form-control" id="password_new" name="password_new"
                                                    type="password" placeholder="Kata Sandi Baru" required>
                                                <label for="floatingInput">Password Baru</label>
                                            </div>

                                            <div class="col-md-6 form-floating mb-3">
                                                <input class="form-control" id="password_new_confirmation"
                                                    name="password_new_confirmation" type="password"
                                                    placeholder="Konfirmasi Kata Sandi" required>
                                                <label for="floatingInput">Konfirmasi Password Baru</label>
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
