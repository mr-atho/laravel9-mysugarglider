@extends('layouts.v_backend')

@section('title')
    Bagan Silsilah {{ $sugarglider->kode }} - {{ $sugarglider->nama }}
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h5>Bagan Silsilah Indukan</h5>
                <h3>{{ $sugarglider->nama }}</h3>
                <p class="text-subtitle text-muted">
                    {{ $sugarglider->shelter->nama }} | {{ $sugarglider->kode }}
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}">{{ __('text.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('pedigree.index') }}">{{ __('text.pedigree') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $sugarglider->kode }}
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
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light text-center">
                                    <tr class="text-uppercase">
                                        <th scope="col">SUGAR GLIDER</th>
                                        <th scope="col">{{ __('text.parents') }}</th>
                                        <th scope="col">{{ __('text.grandparents') }}</th>
                                        <th scope="col">{{ __('text.great_grandparents') }}</th>
                                        <th scope="col">{{ __('text.great_great_grandparents') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <td rowspan="16"
                                            class="{{ $sugarglider->kelamin === 1 ? 'table-primary' : 'table-success' }}">
                                            @if ($silsilah->id != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->id) }}">
                                                    @if ($sugarglider->kelamin === 1)
                                                        &#9794;
                                                    @else
                                                        &#9792;
                                                    @endif

                                                    {{ $silsilah->nama }}
                                                    <br>
                                                    {{ $silsilah->jenis ?? __('text.unknown') }}
                                                </a>
                                            @else
                                                {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td rowspan="8" class="table-primary">
                                            @if ($silsilah->mId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mId) }}">
                                                    &#9794; {{ $silsilah->mNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td rowspan="4" class="table-primary">
                                            @if ($silsilah->mmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mmId) }}">
                                                    &#9794; {{ $silsilah->mmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td rowspan="2" class="table-primary">
                                            @if ($silsilah->mmmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mmmId) }}">
                                                    &#9794; {{ $silsilah->mmmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mmmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td class="table-primary">
                                            @if ($silsilah->mmmmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mmmmId) }}">
                                                    &#9794; {{ $silsilah->mmmmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mmmmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-success">
                                            @if ($silsilah->mmmfId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mmmfId) }}">
                                                    &#9792; {{ $silsilah->mmmfNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mmmfJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" class="table-success">
                                            @if ($silsilah->mmfId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mmfId) }}">
                                                    &#9792; {{ $silsilah->mmfNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mmfJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td class="table-primary">
                                            @if ($silsilah->mmfmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mmfmId) }}">
                                                    &#9794; {{ $silsilah->mmfmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mmfmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-success">
                                            @if ($silsilah->mmffId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mmffId) }}">
                                                    &#9792; {{ $silsilah->mmffNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mmffJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4" class="table-success">
                                            @if ($silsilah->mfId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mfId) }}">
                                                    &#9792; {{ $silsilah->mfNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mfJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td rowspan="2" class="table-primary">
                                            @if ($silsilah->mfmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mfmId) }}">
                                                    &#9794; {{ $silsilah->mfmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mfmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td class="table-primary">
                                            @if ($silsilah->mfmmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mfmmId) }}">
                                                    &#9794; {{ $silsilah->mfmmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mfmmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-success">
                                            @if ($silsilah->mfmfId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mfmfId) }}">
                                                    &#9792; {{ $silsilah->mfmfNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mfmfJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" class="table-success">
                                            @if ($silsilah->mffId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mffId) }}">
                                                    &#9792; {{ $silsilah->mffNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mffJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td class="table-primary">
                                            @if ($silsilah->mffmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mffmId) }}">
                                                    &#9794; {{ $silsilah->mffmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mffmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-success">
                                            @if ($silsilah->mfffId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->mfffId) }}">
                                                    &#9792; {{ $silsilah->mfffNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->mfffJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="8" class="table-success">
                                            @if ($silsilah->fId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->fId) }}">
                                                    &#9792; {{ $silsilah->fNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->fJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td rowspan="4" class="table-primary">
                                            @if ($silsilah->fmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->fmId) }}">
                                                    &#9794; {{ $silsilah->fmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->fmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td rowspan="2" class="table-primary">
                                            @if ($silsilah->fmmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->fmmId) }}">
                                                    &#9794; {{ $silsilah->fmmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->fmmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td class="table-primary">
                                            @if ($silsilah->fmmmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->fmmmId) }}">
                                                    &#9794; {{ $silsilah->fmmmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->fmmmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-success">
                                            @if ($silsilah->fmmfId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->fmmfId) }}">
                                                    &#9792; {{ $silsilah->fmmfNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->fmmfJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" class="table-success">
                                            @if ($silsilah->fmfId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->fmfId) }}">
                                                    &#9792; {{ $silsilah->fmfNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->fmfJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td class="table-primary">
                                            @if ($silsilah->fmfmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->fmfmId) }}">
                                                    &#9794; {{ $silsilah->fmfmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->fmfmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-success">
                                            @if ($silsilah->fmffId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->fmffId) }}">
                                                    &#9792; {{ $silsilah->fmffNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->fmffJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4" class="table-success">
                                            @if ($silsilah->ffId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->ffId) }}">
                                                    &#9792; {{ $silsilah->ffNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->ffJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td rowspan="2" class="table-primary">
                                            @if ($silsilah->ffmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->ffmId) }}">
                                                    &#9794; {{ $silsilah->ffmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->ffmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td class="table-primary">
                                            @if ($silsilah->ffmmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->ffmmId) }}">
                                                    &#9794; {{ $silsilah->ffmmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->ffmmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-success">
                                            @if ($silsilah->ffmfId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->ffmfId) }}">
                                                    &#9792; {{ $silsilah->ffmfNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->ffmfJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" class="table-success">
                                            @if ($silsilah->fffId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->fffId) }}">
                                                    &#9792; {{ $silsilah->fffNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->fffJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                        <td class="table-primary">
                                            @if ($silsilah->fffmId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->fffmId) }}">
                                                    &#9794; {{ $silsilah->fffmNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->fffmJenis ?? __('text.unknown') }}
                                            @else
                                                &#9794; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-success">
                                            @if ($silsilah->ffffId != 0)
                                                <a href="{{ route('sugarglider.show', $silsilah->ffffId) }}">
                                                    &#9792; {{ $silsilah->ffffNama }}
                                                </a>
                                                <br>
                                                {{ $silsilah->ffffJenis ?? __('text.unknown') }}
                                            @else
                                                &#9792; {{ __('text.unknown') }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-light text-center">
                                    <tr>
                                        <th scope="col">SUGAR GLIDER</th>
                                        <th scope="col">INDUKAN</th>
                                        <th scope="col">KAKEK-NENEK</th>
                                        <th scope="col">MOYANG</th>
                                        <th scope="col">BUYUT</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
