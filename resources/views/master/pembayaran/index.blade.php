@extends('layouts.app')
@section('styles')
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/css/demo1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}" />
@endsection

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Pembayaran SPP</h6>
                        </div>

                        <form action="{{ route('pembayaran.filter') }}" method="POST" class="d-flex">
                            {{ csrf_field() }}
                            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                                <input type="month" class="form-control bg-transparent border-dark"
                                    placeholder="Select date" name="filter_date"
                                    value="{{ $tanggal_filter ?? date('Y-m') }}">
                            </div>
                            <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                                <i class="btn-icon-prepend" data-feather="filter"></i>
                                Filter
                            </button>
                        </form>


                        {{-- Alert Success --}}
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif

                        {{-- Alert Delete/Danger --}}
                        @if (session()->has('delete'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                {{ session('delete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif

                        <div class="table-responsive mt-3">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Nama Murid</th>
                                        <th>Status Pembayaran</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Nama Paket</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Coding show data pembayaran --}}
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($data_murid as $bayar)
                                        @php
                                            
                                        @endphp
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $bayar->nama_murid }}</td>
                                            <td>
                                                @if (App\Models\Pembayaran::where('id_murid', '=', $bayar->id_murid)->where('tanggal_bayar', 'LIKE', $tanggal_filter . '-%')->exists())
                                                    <span class="badge text-bg-success">Lunas</span>
                                                @else
                                                    <span class="badge text-bg-danger">Belum Lunas</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (App\Models\Pembayaran::where('id_murid', '=', $bayar->id_murid)->where('tanggal_bayar', 'LIKE', $tanggal_filter . '-%')->exists())
                                                    @php
                                                        $dataBayar = App\Models\Pembayaran::where('id_murid', '=', $bayar->id_murid)->get('tanggal_bayar');
                                                    @endphp
                                                    @foreach ($dataBayar as $byr)
                                                        {{ $byr->tanggal_bayar }}
                                                    @endforeach
                                                @else
                                                @endif
                                            </td>
                                            <td>{{ $bayar->nama_paket }}</td>
                                            <td>
                                                {{-- <button type="button" class="btn btn-warning">Ubah</button> --}}

                                                <div class="dropdown mb-2">
                                                    <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-lg text-muted pb-3px"
                                                            data-feather="more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                                        <button type="button" data-bs-toggle="modal"
                                                            class="dropdown-item d-flex align-items-center"
                                                            data-bs-target="#modalEditData{{ $bayar->id_murid }}"><i
                                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                                class="">Edit</span>
                                                        </button>


                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Modal edit data --}}
                                        <div class="modal fade" id="modalEditData{{ $bayar->id_murid }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">

                                                @if (App\Models\Pembayaran::where('id_murid', '=', $bayar->id_murid)->where('tanggal_bayar', 'LIKE', $tanggal_filter . '-%')->exists())
                                                    {{-- Form Edit Data --}}
                                                    <form action="{{ route('pembayaran.update', $bayar->id_murid) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h5 class="modal-title" id="varyingModalLabel">Ubah Data
                                                                    Pembayaran
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    @include('master.pembayaran._editform')
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">
                                                                    Ubah Data Pembayaran
                                                                </button>
                                                    </form>
                                                    @php
                                                        $deleteBayar = App\Models\Pembayaran::where('id_murid', '=', $bayar->id_murid)->get('id_pembayaran');
                                                    @endphp

                                                    @foreach ($deleteBayar as $byr)
                                                        <form method="POST" action="/pembayaran/{{ $byr->id_pembayaran }}"
                                                            class="d-inline">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <input type="hidden" name="id_pembayaran"
                                                                value="{{ $byr->id_pembayaran }}">
                                                            <button onclick="return confirm('Yakin Ingin Menghapus Data ?')"
                                                                class="btn btn-danger" data-bs-dismiss="modal"><i
                                                                    class="btn-icon-prepend"
                                                                    data-feather="trash"></i></button>
                                                        </form>
                                                    @endforeach
                                            </div>
                                        </div>

                                        {{-- /. Form Edit Data --}}
                                    @else
                                        {{-- Form Add Data --}}
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title" id="varyingModalLabel">Tambah Data
                                                    </h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        @include('master.pembayaran._form')
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Tambah
                                                        Data Pembayaran </button>
                                                </div>
                                            </div>

                                        </form>
                                        {{-- /. Form Add Data --}}
                                    @endif
                        </div>
                    </div>
                    @php
                        $number++;
                    @endphp
                    @endforeach
                    {{-- /. coding show data pembayaran --}}


                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('layouts.footer')
    </div>
@endsection
