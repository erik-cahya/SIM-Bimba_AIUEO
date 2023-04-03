@extends('layouts.main')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span style="color:#fd7e14;">Pembayaran</span></li>
                <li class="breadcrumb-item active" aria-current="page">Pembayaran SPP</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Pembayaran SPP</h6>
                            <button type="button" data-bs-toggle="modal" class="btn btn-success"
                                data-bs-target="#staticBackdrop">Tambah Data Pembayaran</button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h5 class="modal-title" id="varyingModalLabel">Tambah Data Pembayaran</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" class="form-horizontal"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @include('master.pembayaran._form')
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success">Send message</button>
                                    </div>
                                </div>

                            </div>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= 15; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>Erik Cahya Pradana</td>
                                            <td>Rp. 3.000.000</td>
                                            <td>02/12/2022</td>
                                            <td>Standard 04</td>
                                            <td>
                                                <button type="button" class="btn btn-warning">Ubah</button>
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
