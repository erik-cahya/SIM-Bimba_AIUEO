@extends('layouts.main')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span style="color:#fd7e14;">Siswa</span></li>
                <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Data Siswa</h6>
                            <button type="button" data-bs-toggle="modal" class="btn btn-success"
                                data-bs-target="#staticBackdrop">Tambah Data
                                Murid</button>
                        </div>
                        <!-- Modal Add Data Murid-->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
                            <form action="/siswa" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title" id="varyingModalLabel">Tambah Data Murid</h5>
                                        </div>
                                        <div class="modal-body">
                                            @include('master.siswa._form')
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Tambah Data</button>
                                        </div>
                                    </div>

                                </div>
                        </div>

                        </form>

                        @if (session()->has('success'))
                            <div class="alert alert-success col-lg-12 mt-2" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive mt-3">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Nama Murid</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Alamat</th>
                                        <th>Nama Ortu</th>
                                        <th>No Telp</th>
                                        <th>Nama Paket</th>
                                        <th>Aksi</th>
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
                                            <td>{{ date('d-m-Y', strtotime($siswa->tanggal_lahir)) }}</td>
                                            <td>{{ $siswa->alamat }}</td>
                                            <td>{{ $siswa->nama_ortu }}</td>
                                            <td>{{ $siswa->no_telp }}</td>
                                            <td>{{ $siswa->nama_paket }}</td>

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
                                                            data-bs-target="#modalEditData{{ $siswa->id_murid }}"><i
                                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                                class="">Edit</span>
                                                        </button>

                                                        <form method="POST" action="/siswa/{{ $siswa->id_murid }}"
                                                            class="d-inline">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button onclick="return confirm('Yakin Ingin Menghapus Data ?')"
                                                                class="dropdown-item d-flex align-items-center"><i
                                                                    data-feather="trash" class="icon-sm me-2"></i> <span
                                                                    class="">Delete</span></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                        {{-- Modal edit data --}}

                                        <div class="modal fade" id="modalEditData{{ $siswa->id_murid }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">

                                                <form action="{{ route('siswa.update', $siswa->id_murid) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="varyingModalLabel">Ubah Data Murid
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                @include('master.siswa._form')
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
