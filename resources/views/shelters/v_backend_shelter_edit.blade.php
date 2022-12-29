@extends('layouts.v_backend')

@section('title')
    Ubah Data Kandang
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ __('text.edit') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('text.change_data') }}
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
                            {{ __('text.edit') }}
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
                            <form role="form" action="{{ route('shelter.update', $shelter->id) }}" method="POST"
                                enctype="multipart/form-data" class="form form-horizontal">
                                @csrf

                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="nama">{{ __('text.name') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama"
                                                value="{{ $shelter->nama }}" placeholder="{{ __('text.name') }}"
                                                required />
                                        </div>


                                        <div class="col-md-4">
                                            <label for="kode">{{ __('text.code') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kode" class="form-control" name="kode"
                                                value="{{ $shelter->kode }}" placeholder="{{ __('text.code') }}"
                                                required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="alamat">{{ __('text.address') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="alamat" class="form-control" name="alamat"
                                                value="{{ $shelter->alamat }}" placeholder="{{ __('text.address') }}"
                                                required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="gmaps">{{ __('text.gmaps') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="gmaps" class="form-control" name="gmaps"
                                                value="{{ $shelter->gmaps }}" placeholder="{{ __('text.gmaps') }}" />
                                            <small class="text-muted ">
                                                <i>Masukkan kode Google Maps yang bergaris bawah seperti pada contoh.
                                                    Contoh:
                                                    https://www.google.com/maps/embed?pb=<u>m18!1m12!1m3!1d699.66425173949...</u></i>
                                            </small>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="image">{{ __('text.logo') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            @if ($shelter->image)
                                                <p>
                                                    <img src="{{ asset('/upload/shelters/' . $shelter->image) }}">
                                                </p>
                                                <input type="file" class="form-control form-control-sm" id="image"
                                                    name="image">
                                                <small class="text-muted ">
                                                    <i>(Ukuran file logo: 150px x 150px)</i>
                                                </small>
                                            @else
                                                <input type="file" class="form-control form-control-sm" id="image"
                                                    name="image">
                                                <small class="text-muted ">
                                                    <i>(Ukuran file logo: 150px x 150px)</i>
                                                </small>
                                            @endif
                                        </div>

                                        <div class="col-md-4">
                                            <label for="keterangan">{{ __('text.description') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"
                                                placeholder="{{ __('text.description') }}">{{ $shelter->keterangan }}</textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="status">{{ __('text.status') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">

                                            <fieldset class="form-group">
                                                <select class="form-select" id="status" name="status"
                                                    value="{{ $shelter->status }}">
                                                    <option value="">Pilih Status</option>
                                                    <option value="1"
                                                        @if ($shelter->status == '1') {{ 'selected' }} @endif>
                                                        {{ __('text.open') }}
                                                    </option>
                                                    <option value="0"
                                                        @if ($shelter->status == '0') {{ 'selected' }} @endif>
                                                        {{ __('text.close') }}
                                                    </option>
                                                </select>
                                            </fieldset>

                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                {{ __('text.save') }}
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
