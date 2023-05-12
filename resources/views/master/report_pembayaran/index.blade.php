@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Laporan SPP Tahunan</h6>
                        <div class="d-flex justift-content-between position-relative">

                            <form action="{{ route('report.filter') }}" method="POST" class="d-flex">
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
                                        <th>Jumlah Uang</th>
                                        <th>Tgl Bayar</th>
                                        <th>Nama Paket</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($get_data_pembayaran as $pembayaran)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $pembayaran->nama_murid }}</td>
                                            <td>Rp. {{ number_format($pembayaran->jumlah_bayar, 0, '', '.') }}</td>
                                            <td>{{ date('d-m-Y', strtotime($pembayaran->tanggal_bayar)) }}</td>
                                            <td>{{ $pembayaran->nama_paket }}</td>
                                        </tr>
                                    @endforeach


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
