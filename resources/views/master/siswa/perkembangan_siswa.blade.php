@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Laporan Perkembangan Siswa</h6>

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
                                    @foreach ($data_siswa as $siswa)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $siswa->nama_murid }}</td>
                                            <td>Komang Kadek</td>
                                            <td>20 Agustus 2001</td>
                                            <td>Sudah bisa membaca dan berhitung, perkembangan anak didik sangat pesat
                                                dan
                                                signifikan</td>
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
