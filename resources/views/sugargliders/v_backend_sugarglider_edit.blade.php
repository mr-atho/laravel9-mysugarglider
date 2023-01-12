@extends('layouts.v_backend')

@section('title')
    Edit Data Sugar Glider
@endsection

@push('styles')
    <link href="{{ asset('assets/css/choices.css') }}" rel="stylesheet">
@endpush

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
                            <a href="{{ route('sugarglider.index') }}">{{ __('text.sugarglider') }}</a>
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
                        <h4 class="card-title">Data Sugar Glider</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form role="form" action="{{ route('sugarglider.update', $sugarglider->id) }}" method="POST"
                                enctype="multipart/form-data" class="form form-horizontal">
                                @csrf

                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="nama">{{ __('text.sugarglider_name') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama"
                                                value="{{ $sugarglider->nama }}"
                                                placeholder="{{ __('text.sugarglider_name') }}" required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="kode">{{ __('text.code') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kode" class="form-control" name="kode"
                                                value="{{ $sugarglider->kode }}" placeholder="{{ __('text.code') }}"
                                                required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="kelamin">{{ __('text.gender') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="kelamin" name="kelamin"
                                                    value="{{ $sugarglider->kelamin }}">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="1"
                                                        @if ($sugarglider->kelamin == '1') {{ 'selected' }} @endif>
                                                        {{ __('text.male') }}
                                                    </option>
                                                    <option value="0"
                                                        @if ($sugarglider->kelamin == '0') {{ 'selected' }} @endif>
                                                        {{ __('text.female') }}
                                                    </option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="oop">{{ __('text.oop_date') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="oop" class="form-control" name="oop"
                                                value="{{ $sugarglider->oop }}" required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="warna">{{ __('text.color') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="warna" class="form-control" name="warna"
                                                value="{{ $sugarglider->warna }}" placeholder="{{ __('text.color') }}"
                                                required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="jenis">{{ __('text.type') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="jenis" class="form-control" name="jenis"
                                                value="{{ $sugarglider->jenis }}" placeholder="{{ __('text.type') }}"
                                                required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="genetika">{{ __('text.genetics') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="genetika" class="form-control" name="genetika"
                                                value="{{ $sugarglider->genetika }}"
                                                placeholder="{{ __('text.genetics') }}" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="indukan_jantan">{{ __('text.parent_male') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="indukan_jantan" name="indukan_jantan"
                                                    value="{{ $sugarglider->indukan_jantan }}" required>
                                                    <option value="">{{ __('text.parent_male') }}</option>
                                                    <option value="0"
                                                        @if ($sugarglider->indukan_jantan == 0) {{ 'selected' }} @endif>
                                                        {{ __('text.unknown') }}</option>
                                                    @foreach ($sugargliders as $sg)
                                                        @if ($sg->kelamin == 1)
                                                            <option value="{{ $sg->id }}"
                                                                @if ($sugarglider->indukan_jantan == $sg->id) {{ 'selected' }} @endif>
                                                                {{ $sg->nama }} - {{ $sg->jenis }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="indukan_betina">{{ __('text.parent_female') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="indukan_betina" name="indukan_betina"
                                                    value="{{ $sugarglider->indukan_betina }}" required>
                                                    <option value="">{{ __('text.parent_female') }}</option>
                                                    <option value="0"
                                                        @if ($sugarglider->indukan_betina == 0) {{ 'selected' }} @endif>
                                                        {{ __('text.unknown') }}</option>
                                                    @foreach ($sugargliders as $sg)
                                                        @if ($sg->kelamin == 0)
                                                            <option value="{{ $sg->id }}"
                                                                @if ($sugarglider->indukan_betina == $sg->id) {{ 'selected' }} @endif>
                                                                {{ $sg->nama }} - {{ $sg->jenis }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="fenotype">{{ __('text.fenotype') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea class="form-control" id="fenotype" name="fenotype" rows="3"
                                                placeholder="{{ __('text.fenotype') }}">{{ $sugarglider->fenotype }}</textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="keterangan">{{ __('text.description') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"
                                                placeholder="{{ __('text.description') }}">{{ $sugarglider->keterangan }}</textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="gambar">{{ __('text.image') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            @if ($sugarglider->gambar)
                                                <p>
                                                    <img src="{{ asset('/upload/sugargliders/' . $sugarglider->gambar) }}"
                                                        class="img-fluid w-100">
                                                </p>

                                                <input type="file" class="form-control form-control-sm" id="gambar"
                                                    name="gambar">
                                                <small class="text-muted ">
                                                    <i>(Ukuran file logo: 500px x 500px)</i>
                                                </small>
                                            @else
                                                <input type="file" class="form-control form-control-sm" id="gambar"
                                                    name="gambar">
                                                <small class="text-muted ">
                                                    <i>(Ukuran file logo: 500px x 500px)</i>
                                                </small>
                                            @endif
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

@push('scripts')
    <script src="{{ asset('assets/js/choices.js') }}"></script>
    <script src="{{ asset('assets/js/form-element-select.js') }}"></script>
@endpush
