<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaketBimbelController extends Controller
{
    public function index()
    {
        $data["data_paket"] = Paket::join('jenis', 'jenis.id_jenis', '=', 'paket.id_jenis')->get();
        $data['data_jenis'] = DB::table('jenis')->get();
        return view('master.paket_bimbel.index', $data);
    }

    public function store(Request $request)
    {
        Paket::create($request->all());
        return redirect('/paket')->with('success', 'Data Paket Berhasil Ditambahkan');
    }

    public function update(Request $request, Paket $paket)
    {
        $paket->update($request->all());
        return redirect('/paket')->with('success', 'Data Murid Berhasil Diupdate');
    }

    public function destroy(Paket $paket)
    {
        Paket::destroy($paket->id_paket);
        return redirect('/paket')->with('success', 'Data Paket Berhasil Dihapus');
    }
}
