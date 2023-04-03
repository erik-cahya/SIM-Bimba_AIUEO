@extends('layouts.main')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span style="color:#fd7e14;">Master</span></li>
                <li class="breadcrumb-item active" aria-current="page">Data Paket Bimbel</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Paket Bimbel</h6>
                            <button class="btn btn-success ">Tambah Data Paket Pembayaran</button>
                        </div>

                        <div class="table-responsive mt-3">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Jenis Paket</th>
                                        <th>Harga Paket</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= 15; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>Standard 04</td>
                                            <td>Reguler</td>
                                            <td>Rp. 450.000/bulan</td>
                                            <td>
                                                {{-- <button type="button" class="btn btn-warning">Ubah</button> --}}

                                                <div class="dropdown mb-2">
                                                    <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-lg text-muted pb-3px"
                                                            data-feather="more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="javascript:;">
                                                            <i data-feather="eye" class="icon-sm me-2"></i> <span
                                                                class="">View</span></a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="javascript:;"><i data-feather="edit-2"
                                                                class="icon-sm me-2"></i> <span
                                                                class="">Edit</span></a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="javascript:;"><i data-feather="trash"
                                                                class="icon-sm me-2"></i> <span
                                                                class="">Delete</span></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor

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
