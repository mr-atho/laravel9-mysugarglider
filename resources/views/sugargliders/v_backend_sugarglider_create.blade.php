@extends('layouts.v_backend')

@section('title')
    Tambah Baru Data Sugar Glider
@endsection

@push('styles')
    <link href="{{ asset('assets/css/choices.css') }}" rel="stylesheet">
@endpush

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
                            <a href="{{ route('sugarglider.index') }}">{{ __('text.sugarglider') }}</a>
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

                            <form role="form" action="{{ route('sugarglider.store') }}" method="POST"
                                enctype="multipart/form-data" class="form form-horizontal">
                                @csrf
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="nama">{{ __('text.sugarglider_name') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama"
                                                value="{{ old('nama') }}"
                                                placeholder="{{ __('text.sugarglider_name') }}" required />
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
                                            <label for="kelamin">{{ __('text.gender') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="kelamin" name="kelamin"
                                                    value="{{ old('kelamin') }}">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="1"
                                                        @if (old('kelamin') == '1') {{ 'selected' }} @endif>
                                                        {{ __('text.male') }}
                                                    </option>
                                                    <option value="0"
                                                        @if (old('kelamin') == '0') {{ 'selected' }} @endif>
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
                                                value="{{ old('oop') }}" required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="warna">{{ __('text.color') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="warna" class="form-control" name="warna"
                                                value="{{ old('warna') }}" placeholder="{{ __('text.color') }}"
                                                required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="jenis">{{ __('text.type') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="jenis" class="form-control" name="jenis"
                                                value="{{ old('jenis') }}" placeholder="{{ __('text.type') }}"
                                                required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="genetika">{{ __('text.genetics') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="genetika" class="form-control" name="genetika"
                                                value="{{ old('genetika') }}" placeholder="{{ __('text.genetics') }}" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="indukan_jantan">{{ __('text.parent_male') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="indukan_jantan" name="indukan_jantan"
                                                    value="{{ old('indukan_jantan') }}" required>
                                                    <option value="">{{ __('text.parent_male') }}</option>
                                                    <option value="0">{{ __('text.unknown') }}</option>
                                                    @foreach ($sugargliders as $sg)
                                                        @if ($sg->kelamin == 1)
                                                            <option value="{{ $sg->id }}">
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
                                                    value="{{ old('indukan_betina') }}" required>
                                                    <option value="">{{ __('text.parent_female') }}</option>
                                                    <option value="0">{{ __('text.unknown') }}</option>
                                                    @foreach ($sugargliders as $sg)
                                                        @if ($sg->kelamin == 0)
                                                            <option value="{{ $sg->id }}">
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
                                            <textarea class="form-control" id="fenotype" name="fenotype" rows="3" value="{{ old('fenotype') }}"
                                                placeholder="{{ __('text.fenotype') }}"></textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="keterangan">{{ __('text.description') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea class="form-control" id="keterangan" rows="3" name="keterangan" value="{{ old('keterangan') }}"
                                                placeholder="{{ __('text.description') }}"></textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="gambar">{{ __('text.image') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input class="form-control form-control-sm" type="file" id="gambar"
                                                name="gambar" value="{{ old('gambar') }}">
                                            <small class="text-muted ">
                                                <i>(Ukuran file gambar: 500px x 500px)</i>
                                            </small>
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
