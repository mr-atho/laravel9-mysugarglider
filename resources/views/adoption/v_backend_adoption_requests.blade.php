@extends('layouts.v_backend')

@section('title')
    Data Permohonan Adopsi
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $sugarglider->nama }} ({{ $sugarglider->jenis }}) </h3>
                <p class="text-subtitle text-muted">
                    {{ __('text.adoption_request') }}
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}">{{ __('text.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{ route('adoption.index') }}">{{ __('text.adoption') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('text.request') }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @if (session('pesan'))
        <div class="alert alert-light-success color-success">
            <i class="bi bi-check-circle"></i> {{ session('pesan') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-light-danger color-danger">
            <i class="bi bi-exclamation-circle"></i>
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif

    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-9">
                <div class="card">
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 40px"></th>
                                        <th>NAMA PEMOHON</th>
                                        <th>KANDANG</th>
                                        <th>TANGGAL</th>
                                        <th>PENAWARAN</th>
                                        <th>KETERANGAN</th>
                                        <th>PROSES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adoptionrequests as $adoptionrequest)
                                        <tr>
                                            <th>
                                                {{ ($adoptionrequests->currentPage() - 1) * $adoptionrequests->links('pagination::v_pagination')->paginator->perPage() + $loop->iteration }}
                                            </th>
                                            <td class="text-bold-500">
                                                {{ $adoptionrequest->nama }}
                                            </td>
                                            <td class="text-bold-500">
                                                <a href="{{ route('shelter.show', $adoptionrequest->kandang_id) }}">
                                                    {{ $adoptionrequest->kandang }}
                                                </a>
                                            </td>
                                            <td class="text-bold-500">
                                                {{ $adoptionrequest->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="text-bold-500">
                                                Rp. {{ number_format($adoptionrequest->harga, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                {{ $adoptionrequest->keterangan }}
                                            </td>
                                            <td>
                                                @if ($adoptionrequest->status == 1)
                                                    <form role="form" action="{{ route('adoptionrequest.select') }}"
                                                        method="POST" enctype="multipart/form-data"
                                                        class="form form-horizontal">
                                                        @csrf

                                                        <input type="hidden" name="adoption_id"
                                                            value="{{ $sugarglider->id }}">

                                                        <input type="hidden" name="adoption_request_id"
                                                            value="{{ $adoptionrequest->id }}">

                                                        <button type="submit" class="btn btn-sm btn-warning">
                                                            <i class="bi bi-check2-circle"></i>
                                                            Pilih
                                                        </button>

                                                    </form>
                                                @elseif ($adoptionrequest->status == 4)
                                                    <span class="btn btn-sm btn-danger disabled">
                                                        <i class="bi bi-file-earmark-excel"></i>
                                                        Tidak Terpilih - Selesai
                                                    </span>
                                                @elseif ($adoptionrequest->status == 5)
                                                    <span class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#paymentForm{{ $adoptionrequest->id }}">
                                                        <i class="bi bi-coin"></i> Terpilih - Pembayaran
                                                    </span>

                                                    <!-- Form Pembayaran adopsi -->
                                                    <div class="modal fade text-left"
                                                        id="paymentForm{{ $adoptionrequest->id }}" tabindex="-1"
                                                        aria-labelledby="paymentLabel{{ $adoptionrequest->id }}"
                                                        style="display: none;" aria-hidden="true">

                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-warning">
                                                                    <h4 class="modal-title text-black"
                                                                        id="adoptionLabel{{ $adoptionrequest->id }}">
                                                                        TERPILIH - PEMBAYARAN
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-x">
                                                                            <line x1="18" y1="6"
                                                                                x2="6" y2="18">
                                                                            </line>
                                                                            <line x1="6" y1="6"
                                                                                x2="18" y2="18">
                                                                            </line>
                                                                        </svg>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <p>
                                                                        Permohonan adopsi untuk:
                                                                    </p>

                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <label
                                                                                for="shelter_id">{{ __('text.sugarglider_name') }}</label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            : {{ $sugarglider->nama }}
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label
                                                                                for="shelter_id">{{ __('text.type') }}</label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            : {{ $sugarglider->jenis }}
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label
                                                                                for="shelter_id">{{ __('text.adoption_price') }}</label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            : Rp.
                                                                            {{ number_format($adoptionrequest->harga, 0, ',', '.') }}
                                                                        </div>
                                                                    </div>

                                                                    <hr>
                                                                    <div class="text-center">
                                                                        <strong>MENUNGGU PEMBAYARAN DARI CALON
                                                                            PEMILIK</strong>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span
                                                                            class="d-none d-sm-block">{{ __('text.close') }}</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($adoptionrequest->status == 6)
                                                    <span name="button" class="btn btn-sm btn-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#shippingForm{{ $adoptionrequest->id }}">
                                                        <i class="bi bi-truck"></i>
                                                        Terpilih - Pengiriman
                                                    </span>

                                                    <!-- Form Pengiriman -->
                                                    <div class="modal fade text-left"
                                                        id="shippingForm{{ $adoptionrequest->id }}" tabindex="-1"
                                                        aria-labelledby="shippingLabel{{ $adoptionrequest->id }}"
                                                        style="display: none;" aria-hidden="true">

                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-info">
                                                                    <h4 class="modal-title white"
                                                                        id="adoptionLabel{{ $adoptionrequest->id }}">
                                                                        TERPILIH - PENGIRIMAN
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-x">
                                                                            <line x1="18" y1="6"
                                                                                x2="6" y2="18">
                                                                            </line>
                                                                            <line x1="6" y1="6"
                                                                                x2="18" y2="18">
                                                                            </line>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <form role="form"
                                                                    action="{{ route('adoptionrequest.shipping', $adoptionrequest->id) }}"
                                                                    method="POST" enctype="multipart/form-data"
                                                                    class="form form-horizontal">
                                                                    @csrf

                                                                    <input type="hidden" name="adoption_id"
                                                                        value="{{ $sugarglider->id }}">

                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Permohonan adopsi untuk:
                                                                        </p>

                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label
                                                                                    for="shelter_id">{{ __('text.sugarglider_name') }}</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                : {{ $sugarglider->nama }}
                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <label
                                                                                    for="shelter_id">{{ __('text.type') }}</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                : {{ $sugarglider->jenis }}
                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <label
                                                                                    for="shelter_id">{{ __('text.adoption_price') }}</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                : Rp.
                                                                                {{ number_format($adoptionrequest->harga, 0, ',', '.') }}
                                                                            </div>
                                                                        </div>
                                                                        <hr>

                                                                        <div class="text-center">
                                                                            <strong>DALAM PROSES MENUNGGU PENGIRIMAN OLEH
                                                                                ANDA</strong>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-light-secondary"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span
                                                                                class="d-none d-sm-block">{{ __('text.close') }}</span>
                                                                        </button>

                                                                        <button type="submit"
                                                                            class="btn btn-primary ml-1"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Terkirim</span>
                                                                        </button>


                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($adoptionrequest->status == 7)
                                                    <span name="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deliveredForm{{ $adoptionrequest->id }}">
                                                        <i class="bi bi-file-earmark-check"></i>
                                                        Terpilih - Terima
                                                    </span>

                                                    <!-- Form Penerimaan -->
                                                    <div class="modal fade text-left"
                                                        id="deliveredForm{{ $adoptionrequest->id }}" tabindex="-1"
                                                        aria-labelledby="deliveredLabel{{ $adoptionrequest->id }}"
                                                        style="display: none;" aria-hidden="true">

                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                    <h4 class="modal-title white"
                                                                        id="adoptionLabel{{ $adoptionrequest->id }}">
                                                                        APAKAH ANDA SUDAH TERIMA?
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-x">
                                                                            <line x1="18" y1="6"
                                                                                x2="6" y2="18"></line>
                                                                            <line x1="6" y1="6"
                                                                                x2="18" y2="18"></line>
                                                                        </svg>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <p>
                                                                        Permohonan adopsi Anda untuk:
                                                                    </p>

                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <label
                                                                                for="shelter_id">{{ __('text.sugarglider_name') }}</label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            : {{ $sugarglider->nama }}
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label
                                                                                for="shelter_id">{{ __('text.type') }}</label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            : {{ $sugarglider->jenis }}
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label
                                                                                for="shelter_id">{{ __('text.adoption_price') }}</label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            : Rp.
                                                                            {{ number_format($sugarglider->harga, 0, ',', '.') }}
                                                                        </div>

                                                                    </div>
                                                                    <hr>
                                                                    <div class="text-center">
                                                                        <strong>MENUNGGU DITERIMA OLEH PEMILIK
                                                                            TERPILIH</strong>
                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($adoptionrequest->status == 8)
                                                    <span class="btn btn-sm btn-success disabled">
                                                        <i class="bi bi-check-circle"></i>
                                                        Terpilih - Selesai
                                                    </span>
                                                @else
                                                    <span class="btn btn-sm btn-danger disabled">
                                                        <i class="bi bi-file-earmark-excel"></i>
                                                        Tidak Terpilih - Selesai
                                                    </span>
                                                @endif


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $adoptionrequests->links('pagination::v_pagination') }}
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Keterangan Proses Adopsi</h4>
                    </div>

                    <div class="card-body">
                        <p>
                            Berikut keterangan tahapan adopsi:
                        </p>
                        <ul class="list-group">
                            <li class="list-group-item d-flex align-items-center">
                                <span class="badge bg-secondary badge-pill badge-round m-3 mt-0 mb-0">
                                    <i class="bi bi-file-earmark-text"></i>
                                </span>
                                <span>Diterima</span>
                            </li>

                            <li class="list-group-item d-flex align-items-center">
                                <span class="badge bg-danger badge-pill badge-round m-3 mt-0 mb-0">
                                    <i class="bi bi-file-earmark-excel"></i>
                                </span>
                                <span>Tidak Terpilih - Selesai</span>
                            </li>

                            <li class="list-group-item d-flex align-items-center">
                                <span class="badge bg-warning badge-pill badge-round m-3 mt-0 mb-0">
                                    <i class="bi bi-coin"></i>
                                </span>
                                <span>Terpilih - Pembayaran</span>
                            </li>

                            <li class="list-group-item d-flex align-items-center">
                                <span class="badge bg-info badge-pill badge-round m-3 mt-0 mb-0">
                                    <i class="bi bi-truck"></i>
                                </span>
                                <span>Terpilih - Pengiriman</span>
                            </li>

                            <li class="list-group-item d-flex align-items-center">

                                <span class="badge bg-primary badge-pill badge-round m-3 mt-0 mb-0">
                                    <i class="bi bi-file-earmark-check"></i>
                                </span>
                                <span>Terpilih - Terima</span>
                            </li>

                            <li class="list-group-item d-flex align-items-center">

                                <span class="badge bg-success badge-pill badge-round m-3 mt-0 mb-0">
                                    <i class="bi bi-check-circle"></i>
                                </span>
                                <span>Terpilih - Selesai</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
