@extends('layouts.v_backend')

@section('title')
    Tidak Ada Profil
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ __('text.shelter_data') }}</h3>
                <p class="text-subtitle text-muted">{{ __('text.change_data') }}</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}">{{ __('text.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('text.shelter') }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>




    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="alert alert-danger">
                    <h4 class="alert-heading">Profil tidak ditemukan.</h4>
                    <p>Silakan lengkapi data profile Anda terlebih dahulu.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
