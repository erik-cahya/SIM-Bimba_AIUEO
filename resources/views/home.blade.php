@extends('layouts.main')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')
        <div class="page-content">

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-12 stretch-card">
                    <div class="row flex-grow-1">
                        {{-- Total Murid --}}
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="card-title mb-0">Total Murid</h6>
                                        <div class="dropdown mb-2">
                                            <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="eye" class="icon-sm me-2"></i> <span
                                                        class="">View</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                        class="">Edit</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="trash" class="icon-sm me-2"></i> <span
                                                        class="">Delete</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="printer" class="icon-sm me-2"></i> <span
                                                        class="">Print</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="download" class="icon-sm me-2"></i> <span
                                                        class="">Download</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-8">
                                            <h3 class="mb-2">35,084</h3>

                                        </div>
                                        <div class="col-2">
                                            <i data-feather="user" class="icon-xxl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Total Guru --}}
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">

                                        <h6 class="card-title mb-0">Total Guru</h6>
                                        <div class="dropdown mb-2">
                                            <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="eye" class="icon-sm me-2"></i> <span
                                                        class="">View</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                        class="">Edit</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="trash" class="icon-sm me-2"></i> <span
                                                        class="">Delete</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="printer" class="icon-sm me-2"></i> <span
                                                        class="">Print</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="download" class="icon-sm me-2"></i> <span
                                                        class="">Download</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5 text-center">
                                            <h3 class="mb-2">10 Orang</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- row -->

        </div>
        @include('layouts.footer')
    </div>
@endsection
