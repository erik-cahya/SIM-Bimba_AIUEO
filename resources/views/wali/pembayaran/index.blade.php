@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Pembayaran {{ $murid[0]->nama_murid }}</h6>

                        <div class="d-flex justift-content-between position-relative">

                            <form action="{{ route('wali.pembayaran.filter') }}" method="POST" class="d-flex">
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

                        </div>

                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Nama Murid</th>
                                        <th>Jumlah Uang</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Nama Paket</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($data_pembayaran as $bayar)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $bayar->nama_murid }}</td>
                                            <td>Rp. {{ number_format($bayar->jumlah_bayar, 0, '', '.') }}</td>
                                            <td>{{ date('d-m-Y', strtotime($bayar->tanggal_bayar)) }}</td>
                                            <td>{{ $bayar->nama_paket }}</td>
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


        @include('layouts.footer')
    </div>
@endsection
