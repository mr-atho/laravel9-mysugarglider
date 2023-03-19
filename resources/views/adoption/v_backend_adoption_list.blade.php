@extends('layouts.v_backend')

@section('title')
    Data Adopsi Baru
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ __('text.adoption_data') }} </h3>
                <p class="text-subtitle text-muted">
                    {{ __('text.adoption_list') }}
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}">{{ __('text.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('text.adoption') }}
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
                                        <th>NAMA SUGAR GLIDER</th>
                                        <th>JENIS</th>
                                        <th>KANDANG</th>
                                        <th>HARGA</th>
                                        <th>PROSES PERMOHONAN ADOPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adoptions as $adoption)
                                        <tr>
                                            <th>
                                                {{ ($adoptions->currentPage() - 1) * $adoptions->links('pagination::v_pagination')->paginator->perPage() + $loop->iteration }}
                                            </th>
                                            <td class="text-bold-500">
                                                <a href="{{ route('sugarglider.show', $adoption->sgId) }}">
                                                    {{ $adoption->sgNama }}
                                                </a>
                                            </td>
                                            <td class="text-bold-500">
                                                {{ $adoption->sgJenis }}
                                            </td>
                                            <th>
                                                <a href="{{ route('shelter.show', $adoption->sId) }}">
                                                    {{ $adoption->sNama }}
                                                </a>
                                            </th>
                                            <td class="text-bold-500">
                                                Rp. {{ number_format($adoption->harga, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                @if ($adoption->arId)
                                                    @if ($adoption->arStatus == 4)
                                                        <span class="btn btn-sm btn-danger disabled">
                                                            <i class="bi bi-file-earmark-excel"></i>
                                                            Tidak Terpilih - Selesai
                                                        </span>
                                                    @elseif ($adoption->arStatus == 5)
                                                        @if ($adoption->arHarga == 0)
                                                            <span name="button" class="btn btn-sm btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#acceptForm{{ $adoption->id }}">
                                                                <i class="bi bi-file-earmark-check"></i>
                                                                Terpilih - Terima
                                                            </span>

                                                            <!-- Form Terima adopsi -->
                                                            <div class="modal fade text-left"
                                                                id="acceptForm{{ $adoption->id }}" tabindex="-1"
                                                                aria-labelledby="acceptLabel{{ $adoption->id }}"
                                                                style="display: none;" aria-hidden="true">

                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-primary">
                                                                            <h4 class="modal-title white"
                                                                                id="acceptLabel{{ $adoption->id }}">
                                                                                TERPILIH - TERIMA
                                                                            </h4>
                                                                            <button type="button" class="close"
                                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
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
                                                                            action="{{ route('adoptionrequest.finalize', $adoption->cId) }}"
                                                                            method="POST" enctype="multipart/form-data"
                                                                            class="form form-horizontal">
                                                                            @csrf

                                                                            <input type="hidden" name="id"
                                                                                id="id" value="{{ $adoption->id }}">

                                                                            <input type="hidden" name="collection_id"
                                                                                id="collection_id"
                                                                                value="{{ $adoption->cId }}">

                                                                            <input type="hidden" name="shelter_id"
                                                                                id="shelter_id"
                                                                                value="{{ $adoption->arShelterId }}">

                                                                            <input type="hidden" name="adoptionrequest_id"
                                                                                id="shelter_id"
                                                                                value="{{ $adoption->arId }}">

                                                                            <input type="hidden" name="sugarglider_id"
                                                                                id="sugarglider_id"
                                                                                value="{{ $adoption->sgId }}">

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
                                                                                        : {{ $adoption->sgNama }}
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            for="shelter_id">{{ __('text.type') }}</label>
                                                                                    </div>
                                                                                    <div class="col-md-8 form-group">
                                                                                        : {{ $adoption->sgJenis }}
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            for="shelter_id">{{ __('text.adoption_price') }}</label>
                                                                                    </div>
                                                                                    <div class="col-md-8 form-group">
                                                                                        : Rp.
                                                                                        {{ number_format($adoption->arHarga, 0, ',', '.') }}
                                                                                    </div>
                                                                                </div>
                                                                                <hr>

                                                                                <div class="text-center">
                                                                                    <p><strong>DISETUJUI</strong>
                                                                                    </p>

                                                                                    <p>
                                                                                        Apakah Anda sudah menerima Sugar
                                                                                        Glider tersebut?
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-light-secondary"
                                                                                    data-bs-dismiss="modal">
                                                                                    <i
                                                                                        class="bx bx-x d-block d-sm-none"></i>
                                                                                    <span
                                                                                        class="d-none d-sm-block">Close</span>
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary ml-1"
                                                                                    data-bs-dismiss="modal">
                                                                                    <i
                                                                                        class="bx bx-check d-block d-sm-none"></i>
                                                                                    <span class="d-none d-sm-block">Ya,
                                                                                        Pindahkan Data</span>
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <span class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                                data-bs-target="#paymentForm{{ $adoption->id }}">
                                                                <i class="bi bi-coin"></i> Terpilih - Pembayaran
                                                            </span>

                                                            <!-- Form Pembayaran adopsi -->
                                                            <div class="modal fade text-left"
                                                                id="paymentForm{{ $adoption->id }}" tabindex="-1"
                                                                aria-labelledby="paymentLabel{{ $adoption->id }}"
                                                                style="display: none;" aria-hidden="true">

                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-warning">
                                                                            <h4 class="modal-title text-black"
                                                                                id="adoptionLabel{{ $adoption->id }}">
                                                                                TERPILIH - PEMBAYARAN
                                                                            </h4>
                                                                            <button type="button" class="close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
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
                                                                        <form
                                                                            action="{{ route('adoptionrequest.store', $adoption->id) }}"
                                                                            method="post">
                                                                            @csrf
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
                                                                                        : {{ $adoption->sgNama }}
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            for="shelter_id">{{ __('text.type') }}</label>
                                                                                    </div>
                                                                                    <div class="col-md-8 form-group">
                                                                                        : {{ $adoption->sgJenis }}
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <label
                                                                                            for="shelter_id">{{ __('text.adoption_price') }}</label>
                                                                                    </div>
                                                                                    <div class="col-md-8 form-group">
                                                                                        : Rp.
                                                                                        {{ number_format($adoption->arHarga, 0, ',', '.') }}
                                                                                    </div>
                                                                                </div>

                                                                                <hr>
                                                                                <div class="text-center">
                                                                                    <strong>DITERIMA</strong>
                                                                                </div>
                                                                                <hr>

                                                                                <p>
                                                                                    Lakukan pembayaran ke rekening bersama
                                                                                    admin:
                                                                                </p>
                                                                                <p>
                                                                                    <strong>
                                                                                        Bank Rakyat Indonesia (BRI)<br>

                                                                                        Tanuarto Simatupang<br>
                                                                                        No. Rek: 122801002406500
                                                                                    </strong>
                                                                                </p>

                                                                                <p>
                                                                                    Konfirmasi pembayaran ke <a
                                                                                        href="https://wa.me/085755333232">
                                                                                        +62 857 5533 3232</a>
                                                                                </p>

                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-light-secondary"
                                                                                    data-bs-dismiss="modal">
                                                                                    <i
                                                                                        class="bx bx-x d-block d-sm-none"></i>
                                                                                    <span
                                                                                        class="d-none d-sm-block">{{ __('text.close') }}</span>
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @elseif ($adoption->arStatus == 6)
                                                        <span name="button" class="btn btn-sm btn-info"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#shippingForm{{ $adoption->id }}">
                                                            <i class="bi bi-truck"></i>
                                                            Terpilih - Pengiriman
                                                        </span>

                                                        <!-- Form Pengiriman -->
                                                        <div class="modal fade text-left"
                                                            id="shippingForm{{ $adoption->id }}" tabindex="-1"
                                                            aria-labelledby="shippingLabel{{ $adoption->id }}"
                                                            style="display: none;" aria-hidden="true">

                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-info">
                                                                        <h4 class="modal-title white"
                                                                            id="adoptionLabel{{ $adoption->id }}">
                                                                            TERPILIH - PENGIRIMAN
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
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
                                                                    <form
                                                                        action="{{ route('adoptionrequest.store', $adoption->id) }}"
                                                                        method="post">
                                                                        @csrf
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
                                                                                    : {{ $adoption->sgNama }}
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        for="shelter_id">{{ __('text.type') }}</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    : {{ $adoption->sgJenis }}
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        for="shelter_id">{{ __('text.adoption_price') }}</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    : Rp.
                                                                                    {{ number_format($adoption->arHarga, 0, ',', '.') }}
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                            <div class="text-center">
                                                                                <strong>PEMBAYARAN DITERIMA<br>
                                                                                    SUGAR GLIDER PROSES PENGIRIMAN
                                                                                    OLEH PEMILIK</strong>
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
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif ($adoption->arStatus == 7)
                                                        <span name="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deliveredForm{{ $adoption->id }}">
                                                            <i class="bi bi-file-earmark-check"></i>
                                                            Terpilih - Terima
                                                        </span>

                                                        <!-- Form Penerimaan -->
                                                        <div class="modal fade text-left"
                                                            id="deliveredForm{{ $adoption->id }}" tabindex="-1"
                                                            aria-labelledby="deliveredLabel{{ $adoption->id }}"
                                                            style="display: none;" aria-hidden="true">

                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-primary">
                                                                        <h4 class="modal-title white"
                                                                            id="adoptionLabel{{ $adoption->id }}">
                                                                            TERPILIH - TERIMA
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-x">
                                                                                <line x1="18" y1="6"
                                                                                    x2="6" y2="18"></line>
                                                                                <line x1="6" y1="6"
                                                                                    x2="18" y2="18"></line>
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                    <form role="form"
                                                                        action="{{ route('adoptionrequest.finalize', $adoption->cId) }}"
                                                                        method="POST" enctype="multipart/form-data"
                                                                        class="form form-horizontal">
                                                                        @csrf

                                                                        <input type="hidden" name="id"
                                                                            id="id" value="{{ $adoption->id }}">

                                                                        <input type="hidden" name="collection_id"
                                                                            id="collection_id"
                                                                            value="{{ $adoption->cId }}">

                                                                        <input type="hidden" name="shelter_id"
                                                                            id="shelter_id"
                                                                            value="{{ $adoption->arShelterId }}">

                                                                        <input type="hidden" name="adoptionrequest_id"
                                                                            id="shelter_id"
                                                                            value="{{ $adoption->arId }}">

                                                                        <input type="hidden" name="sugarglider_id"
                                                                            id="sugarglider_id"
                                                                            value="{{ $adoption->sgId }}">


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
                                                                                    : {{ $adoption->sgNama }}
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        for="shelter_id">{{ __('text.type') }}</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    : {{ $adoption->sgJenis }}
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <label
                                                                                        for="shelter_id">{{ __('text.adoption_price') }}</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    : Rp.
                                                                                    {{ number_format($adoption->arHarga, 0, ',', '.') }}
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                            <div class="text-center">
                                                                                <p>
                                                                                    <strong>DISETUJUI</strong>
                                                                                </p>

                                                                                <p>
                                                                                    Apakah Anda sudah menerima Sugar
                                                                                    Glider tersebut?
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-light-secondary"
                                                                                data-bs-dismiss="modal">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span
                                                                                    class="d-none d-sm-block">Close</span>
                                                                            </button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary ml-1"
                                                                                data-bs-dismiss="modal">
                                                                                <i
                                                                                    class="bx bx-check d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Ya,
                                                                                    Pindahkan Data</span>
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif ($adoption->arStatus == 8)
                                                        <span class="btn btn-sm btn-success disabled">
                                                            <i class="bi bi-check-circle"></i>
                                                            Terpilih - Selesai
                                                        </span>
                                                    @else
                                                        <span class="btn btn-sm bg-secondary text-white disabled">
                                                            <i class="bi bi-file-earmark-text"></i>
                                                            Diterima
                                                        </span>
                                                    @endif
                                                @else
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#adoptionForm{{ $adoption->id }}">
                                                            Ajukan Permohonan
                                                        </button>
                                                    </div>

                                                    <!-- Form Permohonan adopsi -->
                                                    <div class="modal fade text-left"
                                                        id="adoptionForm{{ $adoption->id }}" tabindex="-1"
                                                        aria-labelledby="adoptionLabel{{ $adoption->id }}"
                                                        style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"
                                                                        id="adoptionLabel{{ $adoption->id }}">
                                                                        Permohonan Adopsi<br>
                                                                        {{ $adoption->sgNama }}
                                                                        ({{ $adoption->sgJenis }})
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
                                                                <form
                                                                    action="{{ route('adoptionrequest.store', $adoption->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="adoption_id"
                                                                            value="{{ $adoption->id }}">

                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label
                                                                                    for="shelter_id">{{ __('text.your_shelter') }}</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-select"
                                                                                        id="shelter_id" name="shelter_id"
                                                                                        required>
                                                                                        <option value="">Pilih
                                                                                            Kandang
                                                                                        </option>
                                                                                        @foreach ($shelters as $shelter)
                                                                                            <option
                                                                                                value="{{ $shelter->id }}"
                                                                                                @if (old('shelter_id') == $shelter->id) {{ 'selected' }} @endif>
                                                                                                {{ $shelter->nama }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <small class="text-muted">Apabila
                                                                                        nama
                                                                                        kandang tidak ditemukan, Anda
                                                                                        dapat memasukan nama kandang
                                                                                        yang
                                                                                        baru
                                                                                        pada halaman <a
                                                                                            href="{{ route('shelter.index') }}">ini</a></small>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label for="harga">
                                                                                    {{ __('text.adoption_price') }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <input type="number" id="harga"
                                                                                    class="form-control" name="harga"
                                                                                    value="{{ $adoption->harga }}"
                                                                                    min="0" placeholder="0"
                                                                                    required />
                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <label
                                                                                    for="keterangan">{{ __('text.description') }}</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-light-secondary"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Close</span>
                                                                        </button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary ml-1"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Ajukan
                                                                                Permohonan</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>



                        </div>
                        @endif
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $adoptions->links('pagination::v_pagination') }}
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
