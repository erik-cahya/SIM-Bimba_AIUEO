@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span style="color:#fd7e14;">Data User</span></li>

            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Data User</h6>
                            <button type="button" data-bs-toggle="modal" class="btn btn-success"
                                data-bs-target="#staticBackdrop">
                                <i class="btn-icon-prepend" data-feather="user-plus"></i>
                                Tambah Data User</button>
                        </div>
                        <!-- Modal Add Data Murid-->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
                            <form action="/user" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">

                                            <h5 class="modal-title" id="varyingModalLabel">Tambah Data User</h5>
                                        </div>
                                        <div class="modal-body">
                                            @include('user._form')
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
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
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Hak Akses</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $number = 1; @endphp
                                    @foreach ($data_user as $user)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $user->nama_user }}</td>
                                            <td>
                                                @if ($user->hak_akses === 'kepala_staff')
                                                    {{ $user->hak_akses = 'Kepala Staff' }}
                                                @elseif ($user->hak_akses === 'guru')
                                                    {{ $user->hak_akses = 'Guru' }}
                                                @endif
                                            </td>
                                            <td>{{ $user->username }}</td>
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
                                                            data-bs-target="#modalEditData{{ $user->id_user }}"><i
                                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                                class="">Edit</span>
                                                        </button>

                                                        <form method="POST" action="/user/{{ $user->id_user }}"
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

                                        <div class="modal fade" id="modalEditData{{ $user->id_user }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">

                                                <form action="{{ route('user.update', $user->id_user) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="varyingModalLabel">Ubah Data Murid
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                @include('user._form')
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Ubah
                                                                Data User</button>
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
