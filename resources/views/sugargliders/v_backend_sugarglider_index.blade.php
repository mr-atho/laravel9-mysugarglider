@extends('layouts.v_backend')

@section('title')
    Data Kandang
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ __('text.sugarglider_data') }} </h3>
                <p class="text-subtitle text-muted">
                    {{ __('text.change_data') }}
                </p>
                <p>
                    <a href="{{ route('sugarglider.create') }}">
                        <span class="badge bg-primary">{{ __('text.add_new') }}</span>
                    </a>
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}">{{ __('text.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('text.sugarglider') }}
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
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>KODE</th>
                                        <th>JENIS</th>
                                        <th>ADOPSI</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sugargliders as $sugarglider)
                                        <tr>
                                            <td class="text-bold-500">{{ $sugarglider->nama }}</td>
                                            <td>{{ $sugarglider->kode }}</td>
                                            <td class="text-bold-500">{{ $sugarglider->jenis }}</td>
                                            <td>
                                                @if ($sugarglider->adopsi == '1')
                                                    {{ __('text.yes') }}
                                                @else
                                                    {{ __('text.no') }}
                                                @endif
                                            </td>
                                            <td class="buttons d-flex">
                                                <a href="{{ route('sugarglider.edit', $sugarglider->id) }}"
                                                    class="btn icon btn-primary" title="{{ __('text.edit') }}"><i
                                                        class="bi bi-pencil"></i></a>

                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                                <div class="modal fade text-left" id="danger" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h5 class="modal-title white" id="myModalLabel120">
                                                                    {{ __('text.delete_data') }}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span
                                                                        class="d-none d-sm-block">{{ __('text.close') }}</span>
                                                                </button>

                                                                <form method="POST"
                                                                    action="{{ route('sugarglider.destroy', $sugarglider->id) }}">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $sugarglider->id }}">
                                                                    <button type="submit" id="delete"
                                                                        class="btn btn-danger ml-1" data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span
                                                                            class="d-none d-sm-block">{{ __('text.delete') }}</span>
                                                                    </button>


                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
