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
                                            <h6 class="text-muted font-semibold">{{ __('text.shelter') }}</h6>
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
                                            <h6 class="text-muted font-semibold">My Sugar Glider</h6>
                                            <h6 class="font-extrabold mb-0">{{ $count_sugargliders }}</h6>
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
                                        <a href="{{ route('collection.index') }}">
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="{{ route('collection.index') }}">
                                            <h6 class="text-muted font-semibold">Koleksi</h6>
                                            <h6 class="font-extrabold mb-0">{{ $count_collections }}</h6>
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
                                        <a href="{{ route('adoption.index') }}">
                                            <div class="stats-icon green mb-2">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="{{ route('adoption.index') }}">
                                            <h6 class="text-muted font-semibold">Siap diadopsi</h6>
                                            <h6 class="font-extrabold mb-0">{{ $count_adoptions }}</h6>
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
                                        <a href="{{ route('adoption.list') }}">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldStar"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="{{ route('adoption.list') }}">
                                            <h6 class="text-muted font-semibold">Dapat diadopsi</h6>
                                            <h6 class="font-extrabold mb-0">{{ $count_adoptable }}</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-xl-3 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                @if (Auth::user()->avatar)
                                    <img src="{{ asset('/upload/avatars/' . Auth::user()->avatar) }}" />
                                @else
                                    <img src="{{ asset('/assets/images/no-image.png') }}" />
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

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Langkah menggunakan aplikasi</h4>
                    </div>
                    <div class="card-body">
                        <ol>
                            <li>Lengkapi data <a href="{{ route('profile') }}">profil</a> Anda terlebih dahulu.</li>
                            <li>Masukkan data <a href="{{ route('shelter.index') }}">kandang</a> Anda.</li>
                            <li>
                                Masukkan data <a href="{{ route('sugarglider.index') }}">Sugar Glider</a> Anda.
                                <br>
                                <small>Lengkapi data indukan untuk setiap Sugar Glider agar dapat mendapatkan silsilah
                                    keturunan.</small>
                            </li>
                            <li>Buatlah data <a href="{{ route('collection.index') }}">koleksi</a> dengan menggabungkan
                                data
                                <a href="{{ route('sugarglider.index') }}">Sugar Glider</a> ke data
                                <a href="{{ route('sugarglider.index') }}">kandang</a> Anda.
                            </li>
                            <li>
                                Buatlah data <a href="{{ route('adoption.index') }}">adopsi</a> dari data <a
                                    href="{{ route('collection.index') }}">koleksi</a> yang Anda
                                dengan mengubah status koleksi terlebih dahulu.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
