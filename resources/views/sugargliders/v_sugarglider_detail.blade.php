@extends('layouts.v_main')

@section('title')
    Detail Sugar Glider
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Database Sugar Glider</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('sugargliders') }}">Koleksi</a></li>
                        <li>{{ $sugarglider->kode }}</li>
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
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <h3>PROFIL</h3>
                                    <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Jenis Kelamin</th>
                                                    <td>
                                                        @if ($sugarglider->kelamin == '0')
                                                            Betina
                                                        @else
                                                            Jantan
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">OOP</th>
                                                    <td>{{ $sugarglider->oop }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Usia Sekarang</th>
                                                    <td>{{ Carbon\Carbon::parse($sugarglider->oop)->diff(Carbon\Carbon::now())->format('%y tahun %m bulan %d hari') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Warna</th>
                                                    <td>{{ $sugarglider->warna }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Jenis</th>
                                                    <td>{{ $sugarglider->jenis }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Genetika</th>
                                                    <td>{{ $sugarglider->genetika }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Fenotype</th>
                                                    <td>{{ $sugarglider->fenotype }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Dapat Diadopsi?</th>
                                                    <td>
                                                        @if ($sugarglider->adopsi == '0')
                                                            Tidak Untuk Diadopsi
                                                        @else
                                                            Ya <br>
                                                            <small>Silakan hubungi
                                                                <a
                                                                    href="{{ route('shelter.show', $sugarglider->shelter->id) }}">{{ $sugarglider->shelter->nama }}</a>
                                                            </small>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <h3>SILSILAH</h3>
                                    <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <tbody>

                                                <tr>
                                                    <th scope="row">Indukan Jantan</th>
                                                    <td>
                                                        @if ($sugarglider->indukan_jantan == 0)
                                                            Tidak Diketahui
                                                        @else
                                                            <a
                                                                href="{{ route('sugarglider.show', $sugarglider->indukan_jantan) }}">
                                                                {{ $indukan->jantan }}
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Indukan Betina</th>
                                                    <td>
                                                        @if ($sugarglider->indukan_betina == 0)
                                                            Tidak Diketahui
                                                        @else
                                                            <a
                                                                href="{{ route('sugarglider.show', $sugarglider->indukan_betina) }}">
                                                                {{ $indukan->betina }}
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Bagan Silsilah</th>
                                                    <td>
                                                        <a href="{{ route('pedigree.show', $sugarglider->id) }}">
                                                            <i class="bi bi-search"></i> Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
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
