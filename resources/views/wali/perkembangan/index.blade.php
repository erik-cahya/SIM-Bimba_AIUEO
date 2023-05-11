@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">

        @include('layouts.navbar')

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <h6 class="card-title">Data Perkembangan Gede Putu Jaya</h6>


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


                                    <tr>
                                        <td>1</td>
                                        <td>Sudah Bisa Membaca</td>
                                        <td>12/01/2022</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Sudah Bisa Membaca</td>
                                        <td>12/01/2022</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sudah Bisa Membaca</td>
                                        <td>12/01/2022</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Sudah Bisa Membaca</td>
                                        <td>12/01/2022</td>
                                    </tr>

                        </div>

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
