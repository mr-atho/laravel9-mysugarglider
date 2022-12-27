@extends('layouts.v_main')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

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
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Koleksi</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="d-none d-sm-none d-md-block">NO</th>
                                <th scope="col">KODE</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">KELAMIN</th>
                                <th scope="col">JENIS</th>
                                <th scope="col">KANDANG</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">SILSILAH</th>
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
                                            Betina
                                        @else
                                            Jantan
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
                                            Tidak Untuk Diadopsi
                                        @else
                                            Terbuka
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
