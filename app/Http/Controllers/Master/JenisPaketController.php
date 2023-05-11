<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisPaketController extends Controller
{
    public function index()
    {
        $data['data_paket'] = DB::table('paket')->join('jenis', 'jenis.id_jenis', '=', 'paket.id_jenis')->get();
        $data['data_jenis'] = Jenis::all();
        return view('master.jenis_paket.index', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Jenis::create($request->all());
        return redirect('/jenis')->with('success', 'Jenis Paket Baru Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        DB::table('jenis')->where('id_jenis', $request->id_jenis)->update(['nama_jenis' => $request->nama_jenis]);
        return redirect('/jenis')->with('success', 'Data Jenis Paket Berhasil Diubah');
    }

    public function destroy(Request $request)
    {
        Jenis::destroy($request->id_jenis);
        return redirect('/jenis')->with('delete', 'Jenis Paket Berhasil Dihapus');
    }
}
