<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketBimbelController extends Controller
{
    public function index()
    {
        $data["data_paket"] = Paket::all();
        $data["auth"] = env('APP_AUTH', 'Kepala_staff');
        return view('master.paket_bimbel.index', $data);
    }

    public function store(Request $request)
    {
        Paket::create($request->all());
        return redirect('/paket')->with('success', 'Data Paket Berhasil Ditambahkan');
    }

    public function update(Request $request, Paket $paket)
    {
        // dd($request->all());

        // $request->validate([
        //     'nama_murid' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'tanggal_masuk' => 'required',
        //     'alamat' => 'required',
        //     'nama_ortu' => 'required',
        //     'no_telp' => 'required',
        //     'nama_paket' => 'required'
        // ]);

        $paket->update($request->all());
        return redirect('/paket')->with('success', 'Data Murid Berhasil Diupdate');
    }


    public function destroy(Paket $paket)
    {
        Paket::destroy($paket->id_paket);
        return redirect('/paket')->with('success', 'Data Paket Berhasil Dihapus');
    }
}
