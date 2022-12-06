@extends('layouts.v_auth')

@section('title')
    Lupa Kata Sandi
@endsection

@section('content')
    <h1 class="auth-title">{{ __('text.forget_password') }}.</h1>
    <p class="auth-subtitle mb-5">
        {{ __('text.forget_password_subtitle') }}
    </p>

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
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" class="form-control form-control-xl" id="email" name="email"
                value="{{ old('email') }}" placeholder="{{ __('text.email') }}" placeholder="Email" autofocus required>
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
            {{ __('text.sent_password_link') }}
        </button>
    </form>

    <div class="text-center mt-5 text-lg fs-4">
        <p class="text-gray-600">
            {{ __('text.remember_account') }}
            <a href="{{ route('login') }}" class="font-bold">{{ __('text.login') }}</a>.
        </p>
        <p>
            {{ __('text.or') }} <a class="font-bold" href="{{ route('register') }}">{{ __('text.create_account') }}</a>
        </p>
    </div>
@endsection
