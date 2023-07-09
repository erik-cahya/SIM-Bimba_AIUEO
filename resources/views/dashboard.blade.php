@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        @include('layouts.navbar')

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <h4 class="mb-3 mb-md-0">Dashboard
                @if (Auth::user()->hak_akses === 'kepala_staff')
                    {{ 'Kepala Staff' }}
                @elseif (Auth::user()->hak_akses === 'guru')
                    {{ 'Guru' }}
                @else
                    {{ 'Orang Tua' }}
                @endif
            </h4>
        </div>

        <div class="row">
            {{-- ################################################ Wali Murid --}}
            @if (Auth::user()->hak_akses === 'wali_murid')
                <div class="row flex-grow-1 justify-content-center">

                    <div class="card col-8">
                        <div class="card-body">
                            {{-- Chart JS --}}
                            <div>
                                <canvas id="chartPerkembangan"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- ################################################ Kepala Staff --}}
            @if (Auth::user()->hak_akses === 'kepala_staff')
                <div class="col-12 col-xl-12 stretch-card">
                    <div class="row flex-grow-1 justify-content-center">
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
                                                <a class="dropdown-item d-flex align-items-center" href="/murid">
                                                    <i data-feather="eye" class="icon-sm me-2"></i>
                                                    <span class="">View</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-8">
                                            <h3 class="mb-2">{{ $count_murid }} </h3>
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
                                                <a class="dropdown-item d-flex align-items-center" href="/user"><i
                                                        data-feather="eye" class="icon-sm me-2"></i>
                                                    <span class="">View</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-8">
                                            <h3 class="mb-2">{{ $count_guru }} Orang</h3>
                                        </div>
                                        <div class="col-2">
                                            <i data-feather="user" class="icon-xxl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="card col-7">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Pendapatan Pembayaran SPP</h5>
                            {{-- Chart JS --}}
                            <div>
                                <canvas id="chartPembayaranKepalaStaff"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- ################################################ Guru --}}
            @if (Auth::user()->hak_akses === 'guru')
                <div class="col-12 col-xl-12 stretch-card">
                    <div class="row flex-grow-1 justify-content-center">

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
                                                        data-feather="eye" class="icon-sm me-2"></i>
                                                    <span class="">View</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-8">
                                            <h3 class="mb-2">{{ $count_perkembangan_murid }} Orang</h3>
                                        </div>
                                        <div class="col-2">
                                            <i data-feather="user" class="icon-xxl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Total Perkembangan Selesi --}}
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">

                                        <h6 class="card-title mb-0">Total Data Perkembangan</h6>
                                        <div class="dropdown mb-2">
                                            <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                        data-feather="eye" class="icon-sm me-2"></i>
                                                    <span class="">View</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-12 col-xl-5 text-center">
                                            <h3 class="mb-2">{{ $count_data_perkembangan }} Data</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="card col-7">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Perkembangan Murid</h5>
                            {{-- Chart JS --}}
                            <div>
                                <canvas id="chartPerkembanganGuru"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div> <!-- row -->
        @include('layouts.footer')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Chart Master --}}
    @if (Auth::user()->hak_akses === 'kepala_staff')
        <script>
            const chartPembayaranKepalaStaff = document.getElementById('chartPembayaranKepalaStaff');
            new Chart(chartPembayaranKepalaStaff, {
                type: 'bar',
                data: {
                    labels: [
                        'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember',
                    ],
                    datasets: [{
                        data: [
                            {{ $pembayaran_januari }},
                            {{ $pembayaran_februari }},
                            {{ $pembayaran_maret }},
                            {{ $pembayaran_april }},
                            {{ $pembayaran_mei }},
                            {{ $pembayaran_juni }},
                            {{ $pembayaran_juli }},
                            {{ $pembayaran_agustus }},
                            {{ $pembayaran_september }},
                            {{ $pembayaran_oktober }},
                            {{ $pembayaran_november }},
                            {{ $pembayaran_desember }},

                        ],
                        backgroundColor: '#36A2EB'
                    }]
                },
                options: {
                    responsives: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        },
                        title: {
                            display: true,
                            text: 'Total Pendapatan : Rp. {{ $total_pendapatan }}'
                        }
                    }
                }
            });
        </script>

        {{-- Chart Wali Murid --}}
    @elseif (Auth::user()->hak_akses === 'wali_murid')
        <script>
            const ctx = document.getElementById('chartPerkembangan');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember',
                    ],
                    datasets: [{
                        label: 'Data Perkembangan Murid',
                        data: [
                            {{ $perkembangan_januari }},
                            {{ $perkembangan_februari }},
                            {{ $perkembangan_maret }},
                            {{ $perkembangan_april }},
                            {{ $perkembangan_mei }},
                            {{ $perkembangan_juni }},
                            {{ $perkembangan_juli }},
                            {{ $perkembangan_agustus }},
                            {{ $perkembangan_september }},
                            {{ $perkembangan_oktober }},
                            {{ $perkembangan_november }},
                            {{ $perkembangan_desember }},
                        ],
                        borderWidth: 1,
                        backgroundColor: '#36A2EB'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        <script>
            const pembayaran = document.getElementById('chartPembayaran');
            new Chart(pembayaran, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($data_murid_wali as $murid)
                            "{{ $murid->nama_murid }}",
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Data Pembayaran Murid',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1,
                        backgroundColor: '#FF6384'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @elseif(Auth::user()->hak_akses === 'guru')
        <script>
            const chartPerkembanganGuru = document.getElementById('chartPerkembanganGuru');

            new Chart(chartPerkembanganGuru, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($data_alokasi as $alokasi)
                            @php
                                $data_murid = Illuminate\Support\Facades\DB::table('murid')
                                    ->where('id_murid', $alokasi->id_murid)
                                    ->get('nama_murid');
                            @endphp
                            @foreach ($data_murid as $dtMurid)
                                '{{ $dtMurid->nama_murid }}',
                            @endforeach
                        @endforeach
                    ],
                    datasets: [{
                        data: [
                            @foreach ($data_alokasi as $alokasi)
                                @php
                                    $data_perkembangan = Illuminate\Support\Facades\DB::table('perkembangan')
                                        ->where('id_murid', $alokasi->id_murid)
                                        ->count();
                                @endphp
                                {{ $data_perkembangan }},
                            @endforeach
                        ],
                        backgroundColor: '#36A2EB'
                    }]
                },
                options: {
                    responsives: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        },
                        title: {
                            display: false,
                            text: 'Total Pendapatan : Rp. '
                        }
                    }
                }
            });
        </script>
    @endif
@endsection
