@extends('layouts.app')
@section('styles')
@endsection

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">

        @include('layouts.navbar')

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <h6 class="card-title">Data Perkembangan {{ $get_name->nama_murid }}</h6>


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
                                        <div class="modal-header ">
                                            <h5 class="modal-title" id="varyingModalLabel">
                                                Tambah Data Perkembangan
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            @include('master.perkembangan._form')
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                        @if (session()->has('delete'))
                            <div class="alert alert-danger col-lg-12 mt-2" role="alert">
                                {{ session('delete') }}
                            </div>
                        @endif

                        <div class="table-responsive mt-3">
                            <table id="dataTableExample" class="table">
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
                                    @if ($data_murid->count() >= 1)
                                        @foreach ($data_murid as $perkembangan)
                                            <tr>
                                                <td>{{ $number }}</td>
                                                <td>{{ $perkembangan->deskripsi }}</td>
                                                <td>{{ date('d-m-Y', strtotime($perkembangan->tgl_perkembangan)) }}</td>
                                                <td>
                                                    {{-- <button type="button" class="btn btn-warning">Ubah</button> --}}
                                                    <div class="dropdown mb-2">
                                                        <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="icon-lg text-muted pb-3px"
                                                                data-feather="more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <button type="button" data-bs-toggle="modal"
                                                                class="dropdown-item d-flex align-items-center"
                                                                data-bs-target="#modalEditData{{ $perkembangan->id_perkembangan }}">
                                                                <i data-feather="edit-2" class="icon-sm me-2"></i>
                                                                <span class="">Edit</span>
                                                            </button>

                                                            <form method="POST"
                                                                action="/perkembangan/{{ $perkembangan->id_perkembangan }}"
                                                                class="d-inline">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <button
                                                                    onclick="return confirm('Yakin Ingin Menghapus Data ?')"
                                                                    class="dropdown-item d-flex align-items-center">
                                                                    <i data-feather="trash" class="icon-sm me-2"></i>
                                                                    <span class="">Delete</span>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>


                                            {{-- Modal edit data --}}

                                            <div class="modal fade" id="modalEditData{{ $perkembangan->id_perkembangan }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">

                                                    <form
                                                        action="{{ route('perkembangan.update', $perkembangan->id_perkembangan) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h5 class="modal-title" id="varyingModalLabel">Ubah Data
                                                                    Perkembangan</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    @include('master.perkembangan._editform')
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Ubah
                                                                    Data</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>

                                            @php
                                                $number++;
                                            @endphp
                                        @endforeach
                                    @else
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    @endsection
