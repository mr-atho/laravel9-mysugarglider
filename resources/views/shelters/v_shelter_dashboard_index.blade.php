@extends('layouts.v_backend')

@section('title')
    Data Kandang
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
                <div class="card">
                    <div class="card-content">
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>KODE</th>
                                        <th>ALAMAT</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($shelters as $shelter)
                                        <tr>
                                            <td class="text-bold-500">{{ $shelter->nama }}</td>
                                            <td>{{ $shelter->kode }}</td>
                                            <td class="text-bold-500">{{ $shelter->alamat }}</td>
                                            <td>{{ $shelter->status }}</td>
                                            <td>
                                                <a href="#">
                                                    <i class="bi bi-pencil-fill" title="Edit"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="bi bi-trash-fill"title="Hapus"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
