<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlokasiMuridController extends Controller
{
    public function index()
    {
        $data['dataGuru'] = DB::table('users')->where('hak_akses', 'guru')->get();
        return view('master.alokasi_murid.index', $data);
    }

    public function detail(Request $request)
    {
        $data['dataMurid'] = DB::table('murid')->orderBy('nama_murid', 'ASC')->get();
        return view('master.alokasi_murid.detail', $data);
    }
}
