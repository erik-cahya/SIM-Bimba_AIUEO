@extends('layouts.app')

@section('content')
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
            <div class="row w-50 ">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card" style=" width:650px; height:400px">
                        <div class="row justify-content-center">

                            <div class="col-md-12 ps-md-0 text-center align-items-center justify-content-center ">

                                <div class="auth-form-wrapper d-flex flex-column align-items-center justify-content-center px-5 py-2"
                                    style="height: 400px;">
                                    <a href="#" class="noble-ui-logo d-block mb-2">
                                        <img src="{{ asset('images/logo.png') }}" width="100px" alt="">
                                        {{-- Bimba <span>A I U E O</span> --}}
                                    </a>
                                    <form class="forms-sample mt-4" method="GET" action="{{ route('dashboard') }}"
                                        style="width: 500px;">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Masukkan Username">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="password" name="password"
                                                autocomplete="current-password" placeholder="Masukkan Password">
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2">
                                                <i class="btn-icon-prepend" data-feather="log-in"></i>
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
