@extends('layouts.main')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')
        <h1>Ini adalah page show siswa</h1>
        @include('layouts.footer')
    </div>
@endsection
