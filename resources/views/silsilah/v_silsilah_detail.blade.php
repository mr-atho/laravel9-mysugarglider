@extends('layouts.v_main')

@section('title')
    Bagan Silsilah {{ $sugarglider->kode }} - {{ $sugarglider->nama }}
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Bagan Silsilah</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('sugargliders') }}">Koleksi</a></li>
                        <li><a href="{{ route('sugarglider.show', $sugarglider->id) }}">{{ $sugarglider->kode }}</a></li>
                        <li>Bagan Silsilah</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="inner-page collection" class="collection">
            <div class="container">
                <div class="collection-wrap">
                    <div class="collection-item">
                        @if ($sugarglider->gambar)
                            <a href="{{ asset('/upload/sugargliders/' . $sugarglider->gambar) }}" class="galelry-lightbox">
                                <img src="{{ asset('/upload/sugargliders/' . $sugarglider->gambar) }}"
                                    class="collection-img" alt="{{ $sugarglider->nama }}">
                            </a>
                        @endif

                        <h2>{{ $sugarglider->nama }}</h2>
                        <h4>
                            <a
                                href="{{ route('shelter.show', $sugarglider->shelter->id) }}">{{ $sugarglider->shelter->nama }}</a>
                            | {{ $sugarglider->kode }}
                        </h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            {{ $sugarglider->keterangan }}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>

                        <div class="collection">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <h3>BAGAN SILSILAH</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered align-middle">
                                            <thead class="table-light text-center">
                                                <tr>
                                                    <th scope="col">SUGAR GLIDER</th>
                                                    <th scope="col">INDUKAN</th>
                                                    <th scope="col">KAKEK-NENEK</th>
                                                    <th scope="col">MOYANG</th>
                                                    <th scope="col">BUYUT</th>
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
                                                                {{ $silsilah->jenis ?? 'Tidak diketahui' }}
                                                            </a>
                                                        @else
                                                            Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td rowspan="8" class="table-primary">
                                                        @if ($silsilah->mId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->mId) }}">
                                                                &#9794; {{ $silsilah->mNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->mJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td rowspan="4" class="table-primary">
                                                        @if ($silsilah->mmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->mmId) }}">
                                                                &#9794; {{ $silsilah->mmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->mmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td rowspan="2" class="table-primary">
                                                        @if ($silsilah->mmmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->mmmId) }}">
                                                                &#9794; {{ $silsilah->mmmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->mmmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td class="table-primary">
                                                        @if ($silsilah->mmmmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->mmmmId) }}">
                                                                &#9794; {{ $silsilah->mmmmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->mmmmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
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
                                                            {{ $silsilah->mmmfJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
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
                                                            {{ $silsilah->mmfJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td class="table-primary">
                                                        @if ($silsilah->mmfmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->mmfmId) }}">
                                                                &#9794; {{ $silsilah->mmfmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->mmfmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
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
                                                            {{ $silsilah->mmffJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
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
                                                            {{ $silsilah->mfJenis ?? 'Tidak Diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td rowspan="2" class="table-primary">
                                                        @if ($silsilah->mfmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->mfmId) }}">
                                                                &#9794; {{ $silsilah->mfmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->mfmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td class="table-primary">
                                                        @if ($silsilah->mfmmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->mfmmId) }}">
                                                                &#9794; {{ $silsilah->mfmmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->mfmmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
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
                                                            {{ $silsilah->mfmfJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
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
                                                            {{ $silsilah->mffJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td class="table-primary">
                                                        @if ($silsilah->mffmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->mffmId) }}">
                                                                &#9794; {{ $silsilah->mffmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->mffmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
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
                                                            {{ $silsilah->mfffJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
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
                                                            {{ $silsilah->fJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td rowspan="4" class="table-primary">
                                                        @if ($silsilah->fmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->fmId) }}">
                                                                &#9794; {{ $silsilah->fmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->fmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td rowspan="2" class="table-primary">
                                                        @if ($silsilah->fmmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->fmmId) }}">
                                                                &#9794; {{ $silsilah->fmmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->fmmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td class="table-primary">
                                                        @if ($silsilah->fmmmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->fmmmId) }}">
                                                                &#9794; {{ $silsilah->fmmmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->fmmmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
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
                                                            {{ $silsilah->fmmfJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
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
                                                            {{ $silsilah->fmfJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td class="table-primary">
                                                        @if ($silsilah->fmfmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->fmfmId) }}">
                                                                &#9794; {{ $silsilah->fmfmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->fmfmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
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
                                                            {{ $silsilah->fmffJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="4" class="table-success">
                                                        @if ($silsilah->fmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->ffId) }}">
                                                                &#9792; {{ $silsilah->ffNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->ffJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td rowspan="2" class="table-primary">
                                                        @if ($silsilah->ffmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->ffmId) }}">
                                                                &#9794; {{ $silsilah->ffmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->ffmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td class="table-primary">
                                                        @if ($silsilah->ffmmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->ffmmId) }}">
                                                                &#9794; {{ $silsilah->ffmmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->ffmmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
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
                                                            {{ $silsilah->ffmfJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
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
                                                            {{ $silsilah->fffJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
                                                        @endif
                                                    </td>
                                                    <td class="table-primary">
                                                        @if ($silsilah->fffmId != 0)
                                                            <a href="{{ route('sugarglider.show', $silsilah->fffmId) }}">
                                                                &#9794; {{ $silsilah->fffmNama }}
                                                            </a>
                                                            <br>
                                                            {{ $silsilah->fffmJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9794; Tidak diketahui
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
                                                            {{ $silsilah->ffffJenis ?? 'Tidak diketahui' }}
                                                        @else
                                                            &#9792; Tidak diketahui
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
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
