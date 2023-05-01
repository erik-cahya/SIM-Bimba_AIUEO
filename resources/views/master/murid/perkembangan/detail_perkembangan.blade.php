@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">

        @include('layouts.navbar')

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @foreach ($get_name as $name)
                            <h6 class="card-title">Data Perkembangan {{ $name }}</h6>
                        @endforeach

                        <div class="d-flex justift-content-between position-relative">

                            <button type="button" data-bs-toggle="modal" class="btn btn-success"
                                data-bs-target="#staticBackdrop">Tambah Data Perkembangan</button>
                        </div>

                        @if (session()->has('success'))
                            <div class="alert alert-success col-lg-12 mt-2" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif


                        <!-- Modal Add Data Perkembangan-->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
                            <form action="/perkembangan" method="POST" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <h5 class="modal-title" id="varyingModalLabel">
                                                Tambah Perkembangan
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            @include('master.murid.perkembangan._form')
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>

                                </div>
                        </div>


                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Perkembangan</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $number = 1;
                                    @endphp

                                    @foreach ($data_murid as $murid)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $murid->deskripsi }}</td>
                                            <td>{{ $murid->tgl_perkembangan }}</td>
                                            <td>
                                                <a href="#" class="btn btn-success">
                                                    Ubah
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
    @endsection
