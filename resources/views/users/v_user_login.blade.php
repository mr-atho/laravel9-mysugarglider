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
            <div class="container">
                <form role="form" action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span><br>
                    @endif

                    <label for="email" class="">Email</label>
                    <input class="form-control" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Email" required><br>


                    <label for="password" class="">Password</label>
                    <input class="form-control" id="password" name="password" value="{{ old('password') }}" type="password"
                        required><br>

                    <button type="submit" class="" id="kirim">Kirim</button>

                </form>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
