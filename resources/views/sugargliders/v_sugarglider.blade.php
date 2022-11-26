@extends('layouts.v_main')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('title')
    Daftar Sugar Glider
@endsection

@push('styles')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 2px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
@endpush

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
                @if (session('pesan'))
                    <strong>SUKSES!</strong> <br>{{ session('pesan') }}<br><br>
                @endif
                <table>
                    <tr>
                        <th>NO.</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kelamin</th>
                        <th>Jenis</th>
                        <th>Kandang</th>
                        <th>Adopsi</th>
                        <th></th>
                    </tr>
                    @foreach ($sugargliders as $sugarglider)
                        <tr>
                            <td>{{ $sugarglider->id }}</td>
                            <td><a href="{{ route('sugargliders') }}/{{ $sugarglider->id }}">{{ $sugarglider->kode }}</a>
                            </td>
                            <td>{{ $sugarglider->nama }}</td>
                            <td>
                                @if ($sugarglider->kelamin == '0')
                                    Betina
                                @else
                                    Jantan
                                @endif
                            </td>
                            <td>{{ $sugarglider->jenis }}</td>
                            <td>{{ $sugarglider->sugarglider_shelter->nama }}</td>
                            <td>
                                @if ($sugarglider->adopsi == '0')
                                    Tidak Untuk Diadopsi
                                @else
                                    Terbuka
                                @endif
                            </td>
                            @if (Auth::user())
                                <td>
                                    <a href="{{ route('sugargliderShow', $sugarglider->id) }}">Detail</a> |
                                    <a href="{{ route('sugargliderEdit', $sugarglider->id) }}">Edit</a> |
                                    <form method="POST" action="{{ route('sugargliderDestroy', $sugarglider->id) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="{{ $sugarglider->id }}">
                                        <button type="submit" class="" id="delete">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </table>
                @if (Auth::user())
                    <a href="{{ route('sugargliderCreate') }}">Tambah Baru</a>
                @endif
            </div>

        </section>


    </main><!-- End #main -->
@endsection
