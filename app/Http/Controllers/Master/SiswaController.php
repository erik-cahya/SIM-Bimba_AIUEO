<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Murid;

class SiswaController extends Controller
{
    // Menu siswa
    public function showSiswa()
    {
        $data["data_siswa"] = Murid::all();
        $data['auth'] = 'kepala_staff';
        return view('master.siswa.data_siswa', $data);
    }

    // Menu Data Perkembangan Murid
    public function showPerkembangan()
    {
        $data['auth'] = 'guru';
        return view('master.siswa.perkembangan_siswa', $data);
    }
}
