@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Jenis Paket Bimbel</h6>
                            <button type="button" data-bs-toggle="modal" class="btn btn-success"
                                data-bs-target="#staticBackdrop"><i class="btn-icon-prepend" data-feather="user-plus"></i>
                                Tambah Data Jenis</button>
                        </div>

                        {{-- Alert Success --}}
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif

                        {{-- Alert Delete/Danger --}}
                        @if (session()->has('delete'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                {{ session('delete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif

                        <!-- Modal -->
                        <form action="/jenis" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title" id="varyingModalLabel">Tambah Jenis Paket</h5>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            @include('master.jenis_paket._form')
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Tambah Jenis Paket</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                        <div class="table-responsive mt-3">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jenis Paket</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $number = 1; @endphp
                                    @foreach ($data_jenis as $jenis)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $jenis->nama_jenis }}</td>
                                            <td>
                                                <div class="dropdown mb-2">
                                                    <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-lg text-muted pb-3px"
                                                            data-feather="more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <button type="button" data-bs-toggle="modal"
                                                            class="dropdown-item d-flex align-items-center"
                                                            data-bs-target="#modalEditData{{ $jenis->id_jenis }}"><i
                                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                                class="">Edit</span>
                                                        </button>

                                                        <form action="{{ route('jenis.delete', $jenis->id_jenis) }}"
                                                            method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <input type="hidden" name="id_jenis"
                                                                value="{{ $jenis->id_jenis }}">
                                                            <button type="submit"
                                                                onclick="return confirm('Yakin Ingin Menghapus Data Paket ?')"
                                                                class="dropdown-item d-flex align-items-center">
                                                                <i data-feather="trash" class="icon-sm me-2"></i> <span
                                                                    class="">Delete</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Modal edit data --}}

                                        <div class="modal fade" id="modalEditData{{ $jenis->id_jenis }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">

                                                <form action="{{ route('jenis.update', $jenis->id_jenis) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="varyingModalLabel">Ubah Jenis Paket
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                @include('master.jenis_paket._form')
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Ubah
                                                                Data jenis</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        @php $number++ @endphp
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
