@extends('layouts.v_main_verification')

@section('title')
    Verifikasi Email
@endsection

@section('content')
    <div class="masthead">
        <div class="masthead-content text-white">
            <div class="container-fluid px-4 px-lg-0">
                <h2 class="fst-italic lh-1 mb-4">{{ __('text.welcome') }},</h2>
                <h1 class="fst-italic lh-1 mb-4">{{ Auth::user()->name }}</h1>
                <p class="mb-5">{{ __('text.verification_cek') }}</p>
                <p class="mb-2">{{ __('text.verification_not_receive') }}</p>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('text.verification_sent') }}
                    </div>
                @endif

                <form role="form" action="{{ route('verification.resend') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg">{{ __('text.verification_request') }}</button>
                </form>

                <br>
                <a class="btn btn-primary btn-lg mt-5" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('text.logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection
