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

        {{-- ##################################################################### Auth Kepala Staff --}}
        @if (Auth::user()->hak_akses === 'kepala_staff')
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Data Perkembangan</h6>

                            <div class="d-flex justift-content-between position-relative">
                                <form action="{{ route('perkembangan.filter') }}" method="POST" class="d-flex">
                                    {{ csrf_field() }}
                                    <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">

                                        <input type="month" class="form-control bg-transparent border-dark"
                                            placeholder="Select date" name="filter_date" value="{{ date('Y-m') }}">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                                        <i class="btn-icon-prepend" data-feather="filter"></i>
                                        Filter
                                    </button>
                                </form>
                                <button class="btn btn-success position-absolute top-50 end-0 translate-middle-y">
                                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                                    Unduh
                                </button>
                            </div>

                            <div class="table-responsive mt-3">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th>Nim</th>
                                            <th>Nama Murid</th>
                                            <th>Nama Guru</th>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($get_data_perkembangan as $perkembangan)
                                            <tr>
                                                <td>{{ $number }}</td>
                                                <td>{{ $perkembangan->nama_murid }}</td>
                                                <td>{{ $perkembangan->nama_user }}</td>
                                                <td>{{ date('d-m-Y', strtotime($perkembangan->tgl_perkembangan)) }}</td>
                                                <td>{{ $perkembangan->deskripsi }}</td>
                                            </tr>
                                            @php
                                                $number++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- ################################################################################# Auth Guru --}}
        @if (Auth::user()->hak_akses === 'guru')
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Data Perkembangan</h6>
                                <button type="button" data-bs-toggle="modal" class="btn btn-success"
                                    data-bs-target="#staticBackdrop">
                                    <i class="btn-icon-prepend" data-feather="plus"></i>
                                    Tambah Data Perkembangan</button>
                            </div>

                            <!-- Modal -->
                            <form action="/perkembangan" method="POST" class="form-horizontal"
                                enctype="multipart/form-data">
                                <div class="modal fade AssetsModal" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="varyingModalLabel">Tambah Data Perkembangan</h5>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                @include('master.perkembangan._addform')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Tambah Data
                                                    Perkembangan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive mt-3">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th>Nim</th>
                                            <th>Nama Murid</th>
                                            <th>Perkembangan Terakhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($get_name as $murid)
                                            <tr>
                                                <td>{{ $number }}</td>
                                                <td>{{ $murid->nama_murid }}</td>
                                                <td>
                                                    {{-- {{ date('d-m-Y', strtotime($data_perkembangan->firstWhere('id_murid', $murid->id_murid)->tgl_perkembangan)) }} --}}
                                                    {{-- @if ($tgl_perkembangan == null)
                                                    @else
                                                        {{ dd($tgl_perkembangan) }}
                                                    @endif --}}
                                                    @if ($data_perkembangan->where('id_murid', $murid->id_murid)->count() >= 1)
                                                        <span class="badge text-bg-primary">
                                                            {{ $data_perkembangan->where('id_murid', $murid->id_murid)->first()->tgl_perkembangan }}
                                                        </span>
                                                    @else
                                                        <span class="badge text-bg-primary">
                                                            Tidak ada data perkembangan
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('perkembangan.detail', $murid->id_murid) }}"
                                                        class="btn btn-success">
                                                        <i class="btn-icon-prepend" data-feather="eye"></i>
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $number++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @include('layouts.footer')
    </div>
@endsection
