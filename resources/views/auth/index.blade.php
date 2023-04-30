@extends('dashboard')

@section('content')
    <h1>{{ Auth::user()->hak_akses }}</h1>
@endsection
