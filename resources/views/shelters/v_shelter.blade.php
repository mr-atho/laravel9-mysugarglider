@extends('layouts.v_main')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('title')
    Kandang
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
                    <h2>Kandang</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Kandang</li>
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
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    @foreach ($shelters as $shelter)
                        <tr>
                            <td>{{ $shelter->id }}</td>
                            <td>{{ $shelter->nama }}</td>
                            <td>{{ $shelter->kode }}</td>
                            <td>{{ $shelter->alamat }}</td>
                            <td>
                                @if ($shelter->status == '1')
                                    Buka
                                @else
                                    Tutup
                                @endif
                            </td>

                            @if (Auth::user())
                                <td>
                                    <a href="{{ route('shelterShow', $shelter->id) }}">Detail</a> |
                                    <a href="{{ route('shelterEdit', $shelter->id) }}">Edit</a> |
                                    <form method="POST" action="{{ route('shelterDestroy', $shelter->id) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="{{ $shelter->id }}">
                                        <button type="submit" class="" id="delete">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
