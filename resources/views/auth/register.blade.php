@extends('layouts.v_auth')

@section('title')
    Daftar Akun Baru
@endsection

@section('content')

    <h1 class="auth-title">{{ __('text.register') }}.</h1>
    <p class="auth-subtitle mb-5">
        {{ __('text.register_subtitle') }}
    </p>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>GAGAL</strong><br>
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif

    <form role="form" action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl" id="nama" name="nama"
                value="{{ old('nama') }}" placeholder="{{ __('text.name') }}" required autofocus>

            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl" id="email" name="email"
                value="{{ old('email') }}" placeholder="{{ __('text.email') }}" required>
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl" id="password" name="password"
                placeholder="{{ __('text.password') }}" required>
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl" id="password_konfirmasi" name="password_konfirmasi"
                placeholder="{{ __('text.password_confirm') }}" required>
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
            {{ __('text.register') }}
        </button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class="text-gray-600">
            {{ __('text.have_account') }}
            <a href="{{ route('login') }}" class="font-bold">{{ __('text.login') }}</a>.
        </p>
    </div>
@endsection
