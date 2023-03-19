@extends('layouts.v_main')

@section('title')
    Detail {{ $collection->sgNama }}
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Data Sugar Glider</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('collections') }}">Koleksi</a></li>
                        <li>{{ $collection->sgKode }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section id="inner-page collection" class="collection">
            <div class="container">
                <div class="collection-wrap">
                    <div class="collection-item">
                        @if ($collection->sgGambar)
                            <a href="{{ asset('/upload/sugargliders/' . $collection->sgGambar) }}" class="galelry-lightbox">
                                <img src="{{ asset('/upload/sugargliders/' . $collection->sgGambar) }}"
                                    class="collection-img" alt="{{ $collection->sgNama }}">
                            </a>
                        @endif

                        <h2>{{ $collection->sgNama }}</h2>
                        <h4>
                            <a href="{{ route('shelter.show', $collection->stId) }}">{{ $collection->stNama }}</a>
                            | {{ $collection->sgKode }}
                        </h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            {{ $collection->sgKeterangan }}
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
                                                        @if ($collection->sgKelamin == '0')
                                                            {{ __('text.female') }}
                                                        @else
                                                            {{ __('text.male') }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">OOP</th>
                                                    <td>{{ $collection->sgOOP }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Usia Sekarang</th>
                                                    <td>{{ Carbon\Carbon::parse($collection->sgOOP)->diff(Carbon\Carbon::now())->format('%y tahun %m bulan %d hari') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Warna</th>
                                                    <td>{{ $collection->sgWarna }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Jenis</th>
                                                    <td>{{ $collection->sgJenis }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Genetika</th>
                                                    <td>{{ $collection->sgGenetika }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Fenotype</th>
                                                    <td>{{ $collection->sgFenotype }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Dapat Diadopsi?</th>
                                                    <td>
                                                        @if ($collection->clStatus == '2')
                                                            {{ __('text.not_adopted') }}
                                                        @elseif ($collection->clStatus == '3')
                                                            Ya <br>
                                                            <small>Silakan hubungi
                                                                <a href="{{ route('shelter.show', $collection->stId) }}">
                                                                    {{ $collection->stNama }}
                                                                </a> atau
                                                                @if (Auth::check())
                                                                    <a href="{{ route('adoption.list') }}">masuk</a>
                                                                @else
                                                                    <a href="{{ route('login') }}">masuk</a>
                                                                @endif
                                                                untuk mulai mengajukan permohonan adopsi.
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
                                                        @if ($collection->sgIndukanJantan == 0)
                                                            {{ __('text.unknown') }}
                                                        @else
                                                            <a
                                                                href="{{ route('sugarglider.show', $collection->sgIndukanJantan) }}">
                                                                {{ $indukan->jantan }}
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Indukan Betina</th>
                                                    <td>
                                                        @if ($collection->sgIndukanBetina == 0)
                                                            {{ __('text.unknown') }}
                                                        @else
                                                            <a
                                                                href="{{ route('sugarglider.show', $collection->sgIndukanBetina) }}">
                                                                {{ $indukan->betina }}
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Bagan Silsilah Indukan</th>
                                                    <td>
                                                        <a href="{{ route('pedigree.show', $collection->sgId) }}">
                                                            <i class="bi bi-search"></i> Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <h3>KETURUNAN</h3>
                                    <ul>
                                        @foreach ($keturunans as $keturunan)
                                            <li>
                                                @if ($keturunan->kelamin === 1)
                                                    &#9794;
                                                @else
                                                    &#9792;
                                                @endif
                                                <a href="{{ $keturunan->id }}">{{ $keturunan->nama }}</a>
                                                ({{ $keturunan->jenis }})
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
