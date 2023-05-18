@extends('layouts.app')
@section('styles')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<!-- End fonts -->

<!-- core:css -->
<link rel="stylesheet" href="{{ asset('/vendors/core/core.css') }}">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendors/dropzone/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendors/dropify/dist/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendors/pickr/themes/classic.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendors/flatpickr/flatpickr.min.css') }}">
<!-- End plugin css for this page -->

<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('/fonts/feather-font/css/iconfont.css') }}">
<link rel="stylesheet" href="{{ asset('/vendors/flag-icon-css/css/flag-icon.min.css') }}">
<!-- endinject -->

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
                        <h6 class="card-title">ERIK CAHYA PRADANA</h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                  Data Murid
                                  <span class="badge rounded-pill bg-primary">4</span>
                            </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Alokasikan Murid</a>
                            </li>
                          </ul>
                          {{-- Data Murid --}}
                          <div class="tab-content border border-top-0 p-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="table-responsive mt-3">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                            <tr>
                                                <th>Nim</th>
                                                <th>Nama Murid</th>
                                                <th>Perkembangan Terakhir</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <tr>
                                                   <td>1</td>
                                                   <td>1</td>
                                                   <td>1</td>
                                                   <td>
                                                        <div class="dropdown mb-2">
                                                            <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="icon-lg text-muted pb-3px" data-feather="more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="#" class="dropdown-item d-flex align-items-center">
                                                                    <i data-feather="eye" class="icon-sm me-2"></i>Detail
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- Data Alokasi --}}
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <h4 class="card-title">Data Murid</h4>

                                  <div class="row mb-3">
                                    <div class="col-1">
                                      <label for="defaultconfig" class="col-form-label">Nama Murid</label>
                                    </div>
                                    <div class="col-5">
                                      <select class="js-example-basic-single form-select" data-width="100%">
                                        @foreach ($dataMurid as $murid)
                                            <option value="TX">{{ $murid->nama_murid }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>

                                  <button type="submit" class="btn btn-primary me-2">Tambah Data</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>
    <!-- core:js -->
    @endsection

    {{-- @section('script')
      <script src="{{ asset('/vendors/core/core.js') }}"></script>
      <!-- endinject -->

      <!-- Plugin js for this page -->
      <script src="{{ asset('/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
      <script src="{{ asset('/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
      <script src="{{ asset('/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
      <script src="{{ asset('/vendors/select2/select2.min.js') }}"></script>
      <script src="{{ asset('/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
      <script src="{{ asset('/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
      <script src="{{ asset('/vendors/dropzone/dropzone.min.js') }}"></script>
      <script src="{{ asset('/vendors/dropify/dist/dropify.min.js') }}"></script>
      <script src="{{ asset('/vendors/pickr/pickr.min.js') }}"></script>
      <script src="{{ asset('/vendors/moment/moment.min.js') }}"></script>
      <script src="{{ asset('/vendors/flatpickr/flatpickr.min.js') }}"></script>
      <!-- End plugin js for this page -->

      <!-- inject:js -->
      <script src="{{ asset('/vendors/feather-icons/feather.min.js') }}"></script>
      <script src="{{ asset('/js/template.js') }}"></script>
      <!-- endinject -->

      <!-- Custom js for this page -->
      <script src="{{ asset('/js/form-validation.js') }}"></script>
      <script src="{{ asset('/js/bootstrap-maxlength.js') }}"></script>
      <script src="{{ asset('/js/inputmask.js') }}"></script>
      <script src="{{ asset('/js/select2.js') }}"></script>
      <script src="{{ asset('/js/typeahead.js') }}"></script>
      <script src="{{ asset('/js/tags-input.js') }}"></script>
      <script src="{{ asset('/js/dropzone.js') }}"></script>
      <script src="{{ asset('/js/dropify.js') }}"></script>
      <script src="{{ asset('/js/pickr.js') }}"></script>
      <script src="{{ asset('/js/flatpickr.js') }}"></script>
    @endsection --}}
