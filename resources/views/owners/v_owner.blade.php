@extends('layouts.v_main')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection

@section('title')
    Pemilik
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
                    <h2>Pemilik</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Pemilik</li>
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
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th></th>
                    </tr>
                    @foreach ($owners as $owner)
                        <tr>
                            <td>{{ $owner->id }}</td>
                            <td>{{ $owner->nama }}</td>
                            <td>{{ $owner->alamat }}</td>
                            <td>{{ $owner->telp }}</td>
                            @if (Auth::user())
                                <td>
                                    <a href="{{ route('owner.show', $owner->id) }}">Detail</a> |

                                    <a href="{{ route('owner.edit', $owner->id) }}"><i class="bi bi-pencil"></i></a> |
                                    <form method="POST" action="{{ route('owner.destroy', $owner->id) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="{{ $owner->id }}">
                                        <button type="submit" class="" id="delete"><i
                                                class="bi bi-trash-fill"></i></span>

                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </table>
                @if (Auth::user())
                    <a href="{{ route('owner.create') }}">Tambah Baru</a>
                @endif
            </div>

        </section>


    </main><!-- End #main -->
@endsection
