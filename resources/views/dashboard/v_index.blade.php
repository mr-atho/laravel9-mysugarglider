@extends('layouts.v_backend')

@section('title')
    Dashboard Pengguna
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/iconly.css') }}" type="text/css" />
@endpush

@section('content')
    <div class="page-heading">
        <h3>Profil Anda dalam Angka</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <a href="{{ route('shelter.index') }}">
                                            <div class="stats-icon green  mb-2">
                                                <i class="iconly-boldHome"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="{{ route('shelter.index') }}">
                                            <h6 class="text-muted font-semibold">Kandang</h6>
                                            <h6 class="font-extrabold mb-0">{{ $count_shelters }}</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <a href="{{ route('sugarglider.index') }}">
                                            <div class="stats-icon blue mb-2">
                                                <i class="iconly-boldHeart"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="{{ route('sugarglider.index') }}">
                                            <h6 class="text-muted font-semibold">Sugar Glider</h6>
                                            <h6 class="font-extrabold mb-0">{{ $count_sugargliders }}</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                @if (Auth::user()->avatar)
                                    <img src="{{ asset('/upload/avatars/' . Auth::user()->avatar) }}" />
                                @else
                                    <img src="{{ asset('/assets/images/no-image.png') }}"/>
                                @endif
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{ $user->name }}</h5>
                                <h6 class="text-muted mb-0">{{ $user->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
