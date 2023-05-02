@extends('dashboard')

@section('content')
    <h1>{{ Auth::user()->hak_akses }}</h1>
    @if (Auth::user()->hak_akses === 'kepala_staff')
        <h1>ini user kepala staff</h1>
    @endif
@endsection
