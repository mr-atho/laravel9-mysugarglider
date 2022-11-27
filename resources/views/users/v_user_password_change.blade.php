@extends('layouts.v_main')

@section('title')
    Ubah Passowrd
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
            <div class="container">
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <span class="text-danger">{{ $err }}</span><br><br>
                    @endforeach
                @endif

                @if (session('pesan'))
                    <strong>SUKSES!</strong> <br>{{ session('pesan') }}<br><br>
                @endif

                <form role="form" action="{{ route('password_change') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="password_new" class="">Password Baru</label>
                    <input class="form-control" id="password_new" name="password_new" type="password"
                        required><br>

                    <label for="password_new_confirmation" class="">Konfirmasi Password Baru</label>
                    <input class="form-control" id="password_new_confirmation" name="password_new_confirmation" type="password"
                        required><br>

                    <button type="submit" class="" id="kirim">Kirim</button>

                </form>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
