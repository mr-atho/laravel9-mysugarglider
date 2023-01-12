@extends('layouts.v_backend')

@section('title')
    Bagan Silsilah Sugar Glider
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ __('text.pedigree') }} Sugar Glider </h3>
                <p class="text-subtitle text-muted">
                    {{ __('text.search_data') }}
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}">{{ __('text.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('text.pedigree') }}
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
                                    <tr class="text-uppercase">
                                        <th style="width: 40px"></th>
                                        <th>{{ __('text.code') }}</th>
                                        <th>{{ __('text.name') }}</th>
                                        <th>{{ __('text.type') }}</th>
                                        <th>{{ __('text.shelter') }}</th>
                                        <th>{{ __('text.pedigree') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collections as $collection)
                                        <tr>
                                            <td>
                                                @if ($collection->sgGambar)
                                                    <img src="{{ asset('/upload/sugargliders/' . $collection->sgGambar) }}"
                                                        height="40px">
                                                @else
                                                    <img src="{{ asset('/assets/images/no-image.png') }}" height="40px">
                                                @endif
                                            </td>

                                            <td class="text-bold-500">{{ $collection->sgKode }}</td>
                                            <td>{{ $collection->sgNama }}</td>
                                            <td class="text-bold-500">{{ $collection->sgJenis }}</td>
                                            <td>
                                                {{ $collection->stNama }}
                                            </td>
                                            <td>
                                                <a href="{{ route('pedigree.backend.show', $collection->id) }}"
                                                    class="sidebar-link">
                                                    <i class="bi bi-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        {{ $collections->links('pagination::v_pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
