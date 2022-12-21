@extends('layouts.v_backend')

@section('title')
    Edit Data Sugar Glider
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
                                            <label for="shelter_id">{{ __('text.shelter_name') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="shelter_id" name="shelter_id"
                                                    value="{{ $sugarglider->shelter_id }}">
                                                    <option value="">Pilih Kandang</option>
                                                    @foreach ($shelters as $shelter)
                                                        <option value="{{ $shelter->id }}"
                                                            @if ($sugarglider->shelter_id == $shelter->id) {{ 'selected' }} @endif>
                                                            {{ $shelter->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small class="text-muted">Apabila nama kandang tidak ditemukan, Anda
                                                    dapat memasukan nama kandang yang baru pada halaman <a
                                                        href="{{ route('shelter.index') }}">ini</a></small>
                                            </fieldset>
                                        </div>

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
                                            <input type="text" id="indukan_jantan" class="form-control"
                                                name="indukan_jantan" value="{{ $sugarglider->indukan_jantan }}"
                                                placeholder="{{ __('text.parent_male') }}" required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="indukan_betina">{{ __('text.parent_female') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="indukan_betina" class="form-control"
                                                name="indukan_betina" value="{{ $sugarglider->indukan_betina }}"
                                                placeholder="{{ __('text.parent_female') }}" required />
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
                                                    <img
                                                        src="{{ asset('/upload/sugargliders/' . $sugarglider->gambar) }}">
                                                </p>

                                                <input type="file" class="form-control form-control-sm" id="gambar"
                                                    name="gambar">
                                                <small class="text-muted ">
                                                    <i>(Ukuran file logo: 150px x 150px)</i>
                                                </small>
                                            @else
                                                <input type="file" class="form-control form-control-sm" id="gambar"
                                                    name="gambar">
                                                <small class="text-muted ">
                                                    <i>(Ukuran file logo: 150px x 150px)</i>
                                                </small>
                                            @endif
                                        </div>

                                        <div class="col-md-4">
                                            <label for="adopsi">{{ __('text.is_adopted') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="adopsi" name="adopsi"
                                                    value="{{ $sugarglider->adopsi }}">
                                                    <option value="">Pilihan</option>
                                                    <option value="1"
                                                        @if ($sugarglider->adopsi == '1') {{ 'selected' }} @endif>
                                                        {{ __('text.yes') }}
                                                    </option>
                                                    <option value="0"
                                                        @if ($sugarglider->adopsi == '0') {{ 'selected' }} @endif>
                                                        {{ __('text.no') }}
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
