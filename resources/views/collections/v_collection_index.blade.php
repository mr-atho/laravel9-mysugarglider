@extends('layouts.v_main')

@push('meta')
    <meta name="description" content="Lihat lebih lengkap koleksi Sugar Glider di Indonesia versi Mycollection.id">
@endpush

@section('title')
    Koleksi Sugar Glider
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Koleksi Sugar Glider</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">{{ __('text.home') }}</a></li>
                        <li>{{ __('text.collection') }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr class="text-uppercase">
                                <th scope="col" class="d-none d-sm-none d-md-block">NO</th>
                                <th scope="col">{{ __('text.code') }}</th>
                                <th scope="col">{{ __('text.name') }}</th>
                                <th scope="col">{{ __('text.gender') }}</th>
                                <th scope="col">{{ __('text.type') }}</th>
                                <th scope="col">{{ __('text.shelter') }}</th>
                                <th scope="col">{{ __('text.status') }}</th>
                                <th scope="col">{{ __('text.pedigree') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($collections as $collection)
                                <tr>
                                    <th scope="row" class="d-none d-sm-none d-md-block">
                                        {{ ($collections->currentPage() - 1) * $collections->links('pagination::v_pagination')->paginator->perPage() + $loop->iteration }}
                                    </th>
                                    <td>
                                        <a href="{{ route('sugarglider.show', $collection->sgId) }}">
                                            {{ $collection->sgKode }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('sugarglider.show', $collection->sgId) }}">
                                            {{ $collection->sgNama }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($collection->sgKelamin == '0')
                                            {{ __('text.female') }}
                                        @else
                                            {{ __('text.male') }}
                                        @endif
                                    </td>
                                    <td>{{ $collection->sgJenis }}</td>
                                    <td>
                                        <a href="{{ route('shelters') }}/{{ $collection->stId }}">
                                            {{ $collection->stNama }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($collection->sgStatus == '2')
                                            {{ __('text.not_adopted') }}
                                        @elseif ($collection->sgStatus == '3')
                                            {{ __('text.open_adopted') }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pedigree.show', $collection->sgId) }}">
                                            <i class="bi bi-search"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer mt-4">
                    {{ $collections->links('pagination::v_pagination') }}
                </div>

            </div>
        </section>


    </main><!-- End #main -->
@endsection
