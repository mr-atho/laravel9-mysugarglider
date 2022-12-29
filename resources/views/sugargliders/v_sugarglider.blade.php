@extends('layouts.v_main')

@push('meta')
    <meta name="description" content="Lihat lebih lengkap koleksi Sugar Glider di Indonesia versi MySugarGlider.id">
@endpush

@section('title')
    Daftar Sugar Glider
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Database Sugar Glider</h2>
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
                            @foreach ($sugargliders as $sugarglider)
                                <tr>
                                    <th scope="row" class="d-none d-sm-none d-md-block">
                                        {{ ($sugargliders->currentPage() - 1) * $sugargliders->links('pagination::v_pagination')->paginator->perPage() + $loop->iteration }}
                                    </th>
                                    <td>
                                        <a href="{{ route('sugargliders') }}/{{ $sugarglider->id }}">
                                            {{ $sugarglider->kode }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('sugargliders') }}/{{ $sugarglider->id }}">
                                            {{ $sugarglider->nama }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($sugarglider->kelamin == '0')
                                            {{ __('text.female') }}
                                        @else
                                            {{ __('text.male') }}
                                        @endif
                                    </td>
                                    <td>{{ $sugarglider->jenis }}</td>
                                    <td>
                                        <a href="{{ route('shelter.show', $sugarglider->shelter->id) }}">
                                            {{ $sugarglider->shelter->nama }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($sugarglider->adopsi == '0')
                                            {{ __('text.not_adopted') }}
                                        @else
                                            {{ __('text.open_adopted') }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pedigree.show', $sugarglider->id) }}">
                                            <i class="bi bi-search"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer mt-4">
                    {{ $sugargliders->links('pagination::v_pagination') }}
                </div>

            </div>
        </section>


    </main><!-- End #main -->
@endsection
