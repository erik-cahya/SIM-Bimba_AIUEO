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

                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Alokasi Murid</h6>
                        </div>

                        {{-- Alert Success --}}
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif

                        <div class="table-responsive mt-3">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Jumlah Murid</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($data_guru as $guru)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ strtoupper($guru->nama_user) }}</td>
                                            <td>
                                                <span class="badge text-bg-primary">
                                                    {{ $data_alokasi->where('id_user', $guru->id_user)->count() }} Murid
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('alokasi.detail', $guru->id_user) }}"
                                                    class="btn btn-success">
                                                    <i class="btn-icon-prepend" data-feather="eye"></i>
                                                    Detail
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

        @include('layouts.footer')
    </div>
@endsection
