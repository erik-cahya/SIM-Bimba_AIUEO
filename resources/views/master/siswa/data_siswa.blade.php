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
                        <!-- Modal -->
                        
                        
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                        <form action="{{ route('siswa.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                                            <button type="submit" class="btn btn-success">Send message</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </form>

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
                                            <td>{{ date('d-m-Y',strtotime($siswa->tanggal_lahir)) }}</td>
                                            <td>{{ $siswa->alamat }}</td>
                                            <td>{{ $siswa->nama_ortu }}</td>
                                            <td>{{ $siswa->no_telp }}</td>
                                            <td>{{ $siswa->nama_paket }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning">Ubah</button>
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

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Select 2</h4>
                        <div class="mb-3">
                            <label class="form-label">Single select box using select 2</label>
                            <select class="js-example-basic-single form-select" data-width="100%">
                                <option value="TX">Texas</option>
                                <option value="NY">New York</option>
                                <option value="FL">Florida</option>
                                <option value="KN">Kansas</option>
                                <option value="HW">Hawaii</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

     <script>
     $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    </script>
@endsection