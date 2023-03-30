<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function showSiswa()
    {
        $data['auth'] = 'kepala_staff';
        return view('master.siswa.data_siswa', $data);
    }

    public function showPerkembangan()
    {
        $data['auth'] = 'kepala_staff';
        return view('master.siswa.perkembangan_siswa', $data);
    }
}
