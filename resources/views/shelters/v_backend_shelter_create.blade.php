@extends('layouts.v_backend')

@section('title')
    Tambah Baru Data Kandang
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ __('text.add_new') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('text.input_data') }}
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}">{{ __('text.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('shelter.index') }}">{{ __('text.shelter') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('text.add_new') }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Kandang</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form role="form" action="{{ route('shelter.store') }}" method="POST"
                                enctype="multipart/form-data" class="form form-horizontal">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="nama">{{ __('text.name') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama"
                                                value="{{ old('nama') }}" placeholder="{{ __('text.name') }}" required />
                                        </div>


                                        <div class="col-md-4">
                                            <label for="kode">{{ __('text.code') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kode" class="form-control" name="kode"
                                                value="{{ old('kode') }}" placeholder="{{ __('text.code') }}"
                                                required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="alamat">{{ __('text.address') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="alamat" class="form-control" name="alamat"
                                                value="{{ old('alamat') }}" placeholder="{{ __('text.address') }}"
                                                required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="status">{{ __('text.status') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">

                                            <fieldset class="form-group">
                                                <select class="form-select" id="status" name="status"
                                                    value="{{ old('status') }}">
                                                    <option value="">Pilih Status</option>
                                                    <option value="1"
                                                        @if (old('status') == '1') {{ 'selected' }} @endif>
                                                        {{ __('text.open') }}
                                                    </option>
                                                    <option value="0"
                                                        @if (old('status') == '0') {{ 'selected' }} @endif>
                                                        {{ __('text.close') }}
                                                    </option>
                                                </select>
                                            </fieldset>

                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                {{ __('text.submit') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
