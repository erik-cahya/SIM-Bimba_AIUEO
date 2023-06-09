@extends('layouts.app')

@section('content')
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="mx-auto">
                    <div class="card" style=" width:650px; height:400px">
                        <div class="row justify-content-center">

                            <div class="col-md-12 ps-md-0 text-center align-items-center justify-content-center ">

                                <div class="auth-form-wrapper d-flex flex-column align-items-center justify-content-center px-5 py-2"
                                    style="height: 400px;">
                                    <a href="#" class="noble-ui-logo d-block mb-2">
                                        <img src="{{ asset('images/logo.png') }}" width="100px" alt="">
                                        {{-- Bimba <span>A I U E O</span> --}}
                                    </a>




                                    <form class="forms-sample mt-4" method="POST" action="{{ route('login.custom') }}"
                                        style="width: 500px;">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Masukkan Username" autofocus>
                                        </div>

                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="password" name="password"
                                                autocomplete="current-password" placeholder="Masukkan Password">
                                        </div>


                                        <div class="justify-content-start">
                                            @if (session()->has('success'))
                                                <div class="card text-bg-danger mb-3" style="height: 50px">
                                                    <div class="card-header">Login Gagal! Harap Cek Username/Password</div>
                                                </div>
                                            @elseif ($errors->has('username'))
                                                <div class="card text-bg-danger mb-3" style="height: 50px">
                                                    <div class="card-header">{{ $errors->first('username') }}</div>
                                                </div>
                                            @elseif ($errors->has('password'))
                                                <div class="card text-bg-danger mb-3" style="height: 50px">
                                                    <div class="card-header">{{ $errors->first('password') }}</div>
                                                </div>
                                            @endif
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2">
                                                    <i class="btn-icon-prepend" data-feather="log-in"></i>
                                                    Login
                                                </button>
                                            </div>
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
