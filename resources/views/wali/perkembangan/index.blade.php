@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">

        @include('layouts.navbar')

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <h6 class="card-title">Data Perkembangan {{ $murid[0]->nama_murid }}</h6>


                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Perkembangan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($data_perkembangan as $perkembangan)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $perkembangan->deskripsi }}</td>
                                            <td>{{ $perkembangan->tgl_perkembangan }}</td>
                                        </tr>

                                        @php
                                            $number++;
                                        @endphp
                                    @endforeach

                        </div>

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
