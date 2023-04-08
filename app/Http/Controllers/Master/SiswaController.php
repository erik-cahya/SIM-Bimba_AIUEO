<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Paket;

class SiswaController extends Controller
{
    // Menu siswa
    public function showSiswa()
    {
        $data["data_siswa"] = Murid::all();
        $data["data_paket"] = Paket::all();
        $data['auth'] = 'kepala_staff';
        return view('master.siswa.data_siswa', $data);
    }

    // Menu Data Perkembangan Murid
    public function showPerkembangan()
    {
        $data['auth'] = 'kepala_staff';
        return view('master.siswa.perkembangan_siswa', $data);
    }
}
