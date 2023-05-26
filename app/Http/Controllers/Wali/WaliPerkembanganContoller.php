<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WaliPerkembanganContoller extends Controller
{
    public function index()
    {
        $data['murid'] = DB::table('murid')->select('id_murid', 'nama_murid')->where('id_user', Auth::user()->id_user)->get();
        $data['data_perkembangan'] = DB::table('perkembangan')->where('id_murid', $data['murid'][0]->id_murid)->get();
        return view('wali.perkembangan.index', $data);
    }
}
