<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\AlokasiMurid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlokasiMuridController extends Controller
{
    public function index()
    {
        $data['data_guru'] = DB::table('users')->where('hak_akses', 'guru')->get();
        $data['data_alokasi'] = DB::table('alokasi_murid')->get();

        return view('master.alokasi_murid.index', $data);
    }

    public function detail($id_user, Request $request)
    {
        $data['dataMurid'] = DB::table('murid')->orderBy('nama_murid', 'ASC')->get();
        $data['data_user'] = DB::table('users')->select('id_user', 'nama_user')->where('id_user', $id_user)->get();
        $data['data_alokasi'] = DB::table('alokasi_murid')->join('users', 'users.id_user', '=', 'alokasi_murid.id_user')->join('murid', 'murid.id_murid', '=', 'alokasi_murid.id_murid')->where('alokasi_murid.id_user', $id_user)->get();

        return view('master.alokasi_murid.detail', $data);
    }

    public function store(Request $request)
    {
        AlokasiMurid::create($request->all());
        return back()->with('success', 'Data Murid Berhasil Ditambahkan');
    }
}
