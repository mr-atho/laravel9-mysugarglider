@extends('layouts.v_auth')

@section('title')
    Verifikasi Email
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/style-auth.css') }}" type="text/css" />
@endpush

@section('content')
    <h2 class="auth-subtitle">{{ __('text.welcome') }},</h2>
    <h1 class="auth-title">{{ Auth::user()->name }}</h1>
    <p class="auth-subtitle mb-4">{{ __('text.verification_cek') }}</p>
    <p class="auth-subtitle mb-2">{{ __('text.verification_not_receive') }}</p>

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('text.verification_sent') }}
        </div>
    @endif

    <form role="form" action="{{ route('verification.resend') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <button type="submit" class="btn btn-primary btn-lg">{{ __('text.verification_request') }}</button>
    </form>

    <p class="mt-10">
        <a class="mt-7 text-lg fs-4 font-bold" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            {{ __('text.logout') }}
        </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </p>
@endsection
