@extends('layouts.v_backend')

@section('title')
    Profil
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ __('text.profile') }}</h3>
                <p class="text-subtitle text-muted">Perbaharuai data Anda</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('text.profile') }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @if (session('pesan'))
        <div class="alert alert-light-success color-success">
            <i class="bi bi-check-circle"></i> {{ session('pesan') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-light-danger color-danger">
            <i class="bi bi-exclamation-circle"></i>
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif

    <section class="section">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $user->name }}</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                        <a
                            class="nav-link active"
                            id="profile-tab"
                            data-bs-toggle="tab"
                            href="#profile"
                            role="tab"
                            aria-controls="profile"
                            aria-selected="false"
                            >Profil</a
                        >
                        </li>
                        <li class="nav-item" role="presentation">
                        <a
                            class="nav-link"
                            id="user-tab"
                            data-bs-toggle="tab"
                            href="#user"
                            role="tab"
                            aria-controls="user"
                            aria-selected="false"
                            >Akun</a
                        >
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <p class="mt-2">
                                <form role="form" action="{{ route('dashboard.profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>{{ __('text.address') }}</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="alamat" class="form-control" name="alamat"
                                                    placeholder="{{ __('text.address') }}" />
                                            </div>
                                            <div class="col-md-4">
                                                <label>{{ __('text.telp') }}</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="telp" class="form-control" name="telp"
                                                    placeholder="{{ __('text.telp') }}" />
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </p>
                        </div>
                        <div
                        class="tab-pane fade"
                        id="user"
                        role="tabpanel"
                        aria-labelledby="user-tab"
                        >
                        <p class="mt-2">
                            <form role="form" action="{{ route('dashboard.profile.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>{{ __('text.name') }}</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="name" class="form-control" name="name"
                                            value="{{ $user->name }}" placeholder="{{ __('text.name') }}" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>{{ __('text.email') }}</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="email" id="email" class="form-control" name="email"
                                            value="{{ $user->email }}" placeholder="{{ __('text.email') }}" />
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
