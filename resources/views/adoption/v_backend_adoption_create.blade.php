@extends('layouts.v_backend')

@section('title')
    Tambah Baru Data Adopsi
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
                            <a href="{{ route('collection.index') }}">{{ __('text.collection') }}</a>
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
                        <h4 class="card-title">Data Adopsi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form role="form" action="{{ route('adoption.store') }}" method="POST"
                                enctype="multipart/form-data" class="form form-horizontal">
                                @csrf
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="collection_id">{{ __('text.sugarglider_name') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="collection_id" name="collection_id"
                                                    value="{{ old('collection_id') }}" required>
                                                    <option value="">Pilih Sugar Glider</option>
                                                    @foreach ($collections as $collection)
                                                        <option value="{{ $collection->id }}"
                                                            @if (old('collectionid') == $collection->id) {{ 'selected' }} @endif>
                                                            {{ $collection->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small class="text-muted">Apabila nama Sugar Glider tidak ditemukan, Anda
                                                    dapat memasukan nama Sugar Glider yang baru pada halaman
                                                    <a href="{{ route('sugarglider.index') }}">ini</a> dan memasukkan
                                                    dalam daftar
                                                    <a href="{{ route('collection.index') }}">koleksi</a>.</small>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="harga">{{ __('text.adoption_price') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="harga" class="form-control" name="harga"
                                                value="{{ old('harga') }}" min="0" placeholder="0" required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="keterangan">{{ __('text.description') }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea class="form-control" id="keterangan" rows="3" name="keterangan" value="{{ old('keterangan') }}"
                                                placeholder="{{ __('text.description') }}"></textarea>
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
