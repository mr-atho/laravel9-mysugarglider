@extends('layouts.v_backend')

@section('title')
    Data Adopsi
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ __('text.adoption_data') }} </h3>
                <p class="text-subtitle text-muted">
                    {{ __('text.adoption_list') }}
                </p>
                <p>
                    <a href="{{ route('adoption.create') }}">
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
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 40px"></th>
                                        <th>NAMA SUGAR GLIDER</th>
                                        <th>KANDANG</th>
                                        <th>STATUS</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adoptions as $adoption)
                                        <tr>
                                            <th>
                                                {{ ($adoptions->currentPage() - 1) * $adoptions->links('pagination::v_pagination')->paginator->perPage() + $loop->iteration }}
                                            </th>

                                            <td class="text-bold-500">
                                                {{ $adoption->sgNama }}
                                                {{-- {{ $adoption->sugarglider->nama }} --}}
                                            </td>
                                            <td class="text-bold-500">
                                                {{ $adoption->stNama }}
                                                {{-- {{ $adoption->shelter->nama }} --}}
                                            </td>
                                            <td>
                                                @if ($adoption->status == '0')
                                                    {{ __('text.adopted') }}
                                                @elseif ($adoption->status == '1')
                                                    {{ __('text.dead') }}
                                                @elseif ($adoption->status == '2')
                                                    {{ __('text.live') }} - {{ __('text.not_adopted') }}
                                                @elseif ($adoption->status == '3')
                                                    {{ __('text.live') }} - {{ __('text.open_adopted') }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('collection.edit', $adoption->id) }}"
                                                    class="btn icon btn-primary" title="{{ __('text.edit') }}"><i
                                                        class="bi bi-pencil"></i></a>

                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $adoption->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                                <div class="modal fade text-left" id="delete{{ $adoption->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel{{ $adoption->id }}" aria-hidden="true">
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
                                                                    action="{{ route('collection.destroy', $adoption->id) }}">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $adoption->id }}">
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
                    <div class="card-footer">
                        {{ $adoptions->links('pagination::v_pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
