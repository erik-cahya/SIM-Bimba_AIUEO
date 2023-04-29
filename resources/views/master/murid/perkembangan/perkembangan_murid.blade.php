@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        {{-- ##################################################################### Auth Kepala Staff --}}
        @if ($auth == 'kepala_staff')
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Data Perkembangan</h6>

                            <div class="d-flex justift-content-between position-relative">


                                <form action="{{ route('perkembangan.filter') }}" method="POST" class="d-inline">
                                    {{ csrf_field() }}
                                    <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                                        <span
                                            class="input-group-text input-group-addon bg-transparent border-dark border-end-0"
                                            data-toggle><i data-feather="calendar" class="text-dark"></i></span>
                                        <input type="text" class="form-control bg-transparent border-dark"
                                            placeholder="Select date" name="filter_date" data-input>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                                        <i class="btn-icon-prepend" data-feather="search"></i>
                                        Cari
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
                                        @foreach ($get_name as $murid)
                                            <tr>
                                                <td>{{ $number }}</td>
                                                <td>{{ $murid->nama_murid }}</td>
                                                {{-- <td>{{ $murid->nama_user }}</td>
                                                <td>{{ date('d-m-Y', strtotime($murid->tanggal)) }}</td>
                                                <td>{{ $murid->deskripsi }}</td> --}}

                                                <td>test</td>
                                                <td>test</td>
                                                <td>test</td>
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
        @if ($auth == 'guru')
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

                            <form action="/paket" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="varyingModalLabel">Tambah Data Paket</h5>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                @include('master.murid.perkembangan._addform')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Tambah Data
                                                    Paket</button>
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
                                                <td> 01/12/2022</td>
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
