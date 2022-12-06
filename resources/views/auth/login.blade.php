@extends('layouts.v_auth')

@section('title')
    Masuk
@endsection

@section('content')
    <h1 class="auth-title">{{ __('text.login') }}.</h1>
    <p class="auth-subtitle mb-5">{{ __('text.login_subtitle') }}</p>

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
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl" id="email" name="email"
                value="{{ old('email') }}" placeholder="{{ __('text.email') }}" autofocus required>
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl" id="password" name="password"
                value="{{ old('password') }}" placeholder="{{ __('text.password') }}" required>
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <div class="form-check form-check-lg d-flex align-items-end">
            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                {{ __('text.logged_in') }}
            </label>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
            {{ __('text.login') }}
        </button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class="text-gray-600">{{ __('text.dont_have_account') }}
            <a href="{{ route('register') }}" class="font-bold">{{ __('text.register') }}</a>.
        </p>
        <p>
            <a class="font-bold" href="{{ route('password.forget') }}">{{ __('text.forget_password') }}?</a>
        </p>
    </div>
@endsection
