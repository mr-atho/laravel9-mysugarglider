@extends('layouts.v_main')

@section('title')
    Daftar
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
                        <li>Daftar</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <span class="text-danger">{{ $err }}</span><br><br>
                    @endforeach
                @endif

                <form role="form" action="{{ route('userStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="nama" class="">Nama</label>
                    <input class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama"
                        required><br>

                    <label for="nama" class="">Email</label>
                    <input class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email"
                        required><br>

                    <label for="password" class="">Password</label>
                    <input class="form-control" id="password" name="password" type="password"  required><br>

                    <label for="password_konfirmasi" class="">Password Konfirmasi</label>
                    <input class="form-control" id="password_konfirmasi" name="password_konfirmasi" type="password" required><br>

                    <button type="submit" class="" id="kirim">Kirim</button>

                </form>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
