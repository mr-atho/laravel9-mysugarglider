@extends('layouts.v_backend')

@section('title')
    Ubah Data Koleksi
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
                            <a href="{{ route('collection.index') }}">{{ __('text.collection') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('text.edit') }}
                        </li>
                    </ol>
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
                        <h4 class="card-title">Data Koleksi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form role="form" action="{{ route('collection.update', $collection->id) }}" method="POST"
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
                                                    value="{{ $collection->shelter_id }}" required>
                                                    <option value="">Pilih Kandang</option>
                                                    @foreach ($shelters as $shelter)
                                                        <option value="{{ $collection->shelter_id }}"
                                                            @if ($collection->shelter_id == $shelter->id) {{ 'selected' }} @endif>
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
                                            <label for="sugarglider_id">{{ __('text.sugarglider_name') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="sugarglider_id" name="sugarglider_id"
                                                    value="{{ $collection->sugarglider_id }}" required>
                                                    <option value="">Pilih Sugar Glider</option>
                                                    <option value="{{ $collection->sugarglider_id }}" selected>
                                                        {{ $collection->sugarglider->nama }}
                                                    </option>
                                                    @foreach ($sugargliders as $sugarglider)
                                                        <option value="{{ $sugarglider->id }}">
                                                            {{ $sugarglider->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small class="text-muted">Apabila nama Sugar Glider tidak ditemukan,
                                                    Anda
                                                    dapat memasukan nama Sugar Glider yang baru pada halaman <a
                                                        href="{{ route('sugarglider.index') }}">ini</a></small>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="status">{{ __('text.status') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="status" name="status"
                                                    value="{{ $collection->status }}" required>
                                                    <option value="">Pilihan</option>
                                                    <option value="2"
                                                        @if ($collection->status == '2') {{ 'selected' }} @endif>
                                                        {{ __('text.live') }} - {{ __('text.not_adopted') }}
                                                    </option>
                                                    <option value="3"
                                                        @if ($collection->status == '3') {{ 'selected' }} @endif>
                                                        {{ __('text.live') }} - {{ __('text.open_adopted') }}
                                                    </option>
                                                    <option value="0"
                                                        @if ($collection->status == '0') {{ 'selected' }} @endif>
                                                        {{ __('text.death') }}
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
