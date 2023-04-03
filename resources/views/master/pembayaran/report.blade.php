@extends('layouts.main')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span style="color:#fd7e14;">Pembayaran</span></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan SPP Tahunan</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Laporan SPP Tahunan</h6>

                        <div class="d-flex justift-content-between position-relative">
                            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                                <span class="input-group-text input-group-addon bg-transparent border-dark border-end-0"
                                    data-toggle><i data-feather="calendar" class="text-dark"></i></span>
                                <input type="text" class="form-control bg-transparent border-dark"
                                    placeholder="Select date" data-input>
                            </div>
                            <button type="button" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                                <i class="btn-icon-prepend" data-feather="search"></i>
                                Cari
                            </button>
                            <button class="btn btn-success position-absolute top-50 end-0 translate-middle-y">
                                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                                Unduh
                            </button>
                        </div>

                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Nama Murid</th>
                                        <th>Jumlah Uang</th>
                                        <th>Tgl Bayar</th>
                                        <th>Nama Paket</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= 15; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>Erik Cahya Pradana</td>
                                            <td>Rp.310.000</td>
                                            <td>02/12/2022</td>
                                            <td>Standard 4</td>

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
