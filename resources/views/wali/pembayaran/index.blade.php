@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Pembayaran Gede Putu Jaya</h6>

                        <div class="d-flex justift-content-between position-relative">


                            <form action="{{ route('perkembangan.filter') }}" method="POST" class="d-flex">
                                {{ csrf_field() }}
                                <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                                    <span class="input-group-text input-group-addon bg-transparent border-dark border-end-0"
                                        data-toggle><i data-feather="calendar" class="text-dark"></i></span>
                                    <input type="text" class="form-control bg-transparent border-dark"
                                        placeholder="Select date" name="filter_date" data-input>
                                </div>
                                <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                                    <i class="btn-icon-prepend" data-feather="search"></i>
                                    Cari
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
                                    @for ($i = 1; $i <= 3; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>Gede Putu Jaya</td>
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
