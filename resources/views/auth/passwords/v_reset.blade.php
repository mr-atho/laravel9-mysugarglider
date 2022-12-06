@extends('layouts.v_auth')

@section('title')
    Atur Ulang Kata Sandi
@endsection

@section('content')

    <h1 class="auth-title">{{ __('text.password_reset') }}.</h1>
    <p class="auth-subtitle mb-5">
        {{ __('text.password_reset_subtitle') }}
    </p>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>GAGAL</strong><br>
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif

    @if (session('pesan'))
        <div class="alert alert-success" role="alert">
            <strong>SUKSES</strong><br>
            {{ session('pesan') }}
        </div>
    @endif

    <form role="form" action="{{ route('password.reset.action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" class="form-control form-control-xl" id="email" name="email"
                value="{{ $email }}" readonly>

            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>

        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl" id="password" name="password"
                placeholder="{{ __('text.password_new') }}" autofocus required>
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>

        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl" id="password_konfirmasi"
                name="password_confirmation" placeholder="{{ __('text.password_new_confirmation') }}" autofocus required>
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
            {{ __('text.reset') }}
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
