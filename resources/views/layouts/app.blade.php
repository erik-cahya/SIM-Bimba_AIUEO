<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <title>Sistem informasi manajemen bimba aiueo</title>
    <link rel="website icon" href="{{ asset('images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}">

    {{-- font awesome CSS --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    {{-- select2 css --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

    @yield('styles')

    <style>
        .login_oueter {
            width: 360px;
            max-width: 100%;
        }

        .logo_outer {
            text-align: center;
        }

        .logo_outer img {
            width: 120px;
            margin-bottom: 40px;
        }
    </style>


</head>

<body>

    <div class="main-wrapper">
        @yield('content')
    </div>




    {{-- @yield('script') --}}
    <!-- core:js -->

    <script src="{{ asset('/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <script src="{{ asset('js/data-table.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>

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

    <script src="{{ asset('/js/flatpickr.js') }}"></script>

</body>

</html>
