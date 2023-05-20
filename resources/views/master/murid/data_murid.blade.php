@extends('layouts.app')
@section('styles')
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/css/demo1/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}" />
@endsection
@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Data Murid</h6>
                            <button type="button" data-bs-toggle="modal" class="btn btn-success"
                                data-bs-target="#staticBackdrop">
                                <i class="btn-icon-prepend" data-feather="user-plus"></i> Tambah Data Murid</button>
                        </div>
                        <!-- Modal Add Data Murid-->
                        <div class="modal fade AssetsModal" id="staticBackdrop" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="false">
                            <form action="/murid" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title" id="varyingModalLabel">Tambah Data Murid</h5>
                                        </div>
                                        <div class="modal-body">

                                            @include('master.murid._form')
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
                                        <th>Nama Murid</th>
                                        <th>Tanggal Lahir</th>
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
                                    @foreach ($data_murid as $murid)
                                        <tr>

                                            <td>{{ $number }}</td>
                                            <td>{{ $murid->nama_murid }}</td>
                                            <td>{{ $murid->tempat_lahir }},
                                                {{ date('d-m-Y', strtotime($murid->tanggal_lahir)) }}
                                            </td>
                                            <td>
                                                {{ date('d-m-Y', strtotime($murid->tanggal_masuk)) }}
                                            </td>
                                            <td>{{ $murid->alamat }}</td>
                                            <td>{{ $murid->nama_ortu }}</td>
                                            <td>{{ $murid->no_telp }}</td>
                                            <td>{{ $murid->nama_paket }}</td>

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
                                                            data-bs-target="#modalEditData{{ $murid->id_murid }}"><i
                                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                                class="">Edit</span>
                                                        </button>

                                                        <form method="POST" action="/murid/{{ $murid->id_murid }}"
                                                            class="d-inline">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button onclick="return confirm('Yakin Ingin Menghapus Data ?')"
                                                                class="dropdown-item d-flex align-items-center"><i
                                                                    data-feather="trash" class="icon-sm me-2"></i>
                                                                <span class="">Delete</span></button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Modal edit data --}}
                                        <div class="modal fade" id="modalEditData{{ $murid->id_murid }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">

                                                <form action="{{ route('murid.update', $murid->id_murid) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="varyingModalLabel">Ubah Data Murid
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                @include('master.murid._edit_form')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        // Toggle form add murid
        $(document).ready(function() {
            var el = document.getElementsByClassName('toggle-form-user')[0];
            if (el.checked) {
                $('#form-user').show();
                $('#form-user input').removeAttr('disabled');
            }
        });

        $('.toggle-form-user').change(function() {
            $('#form-user').toggle();
            if (this.checked) {
                $('#form-user input').removeAttr('disabled');
                $('#form-user input[type=radio]:last').attr('checked', true);
            } else {
                $('#form-user input').attr('disabled', true);
            }
        });

        // // Toggle form edit murid
        // $(document).ready(function() {
        //     var el = document.getElementsByClassName('toggle-form-edit-user')[0];
        //     if (el.checked) {
        //         $('#form-edit-user').show();
        //         $('#form-edit-user input').removeAttr('disabled');
        //     }
        // });

        // $('.toggle-form-edit-user').change(function() {
        //     $('#form-edit-user').toggle();
        //     if (this.checked) {
        //         $('#form-edit-user input').removeAttr('disabled');
        //         $('#form-edit-user input[type=radio]:last').attr('checked', true);
        //     } else {
        //         $('#form-edit-user input').attr('disabled', true);
        //     }
        // });
    </script>
@endsection
