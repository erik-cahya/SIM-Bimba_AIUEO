<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Paket;
use Illuminate\Http\Request;


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

    public function store(Request $request){

        $form_data = [
            'nama_murid' => $request->nama_murid,
            'tanggal_lahir' => date('Y-m-d',strtotime( $request->tanggal_lahir)),
            'tanggal_masuk' => date('Y-m-d', strtotime( $request->tanggal_masuk)),
            'alamat' => $request->alamat,
            'nama_ortu' => $request->nama_ortu,
            'no_telp' => $request->no_telp,
            'nama_paket' => $request->nama_paket,
        ];
        Murid::create($form_data);
        
        $message = [
            'alert-type'=>'success',
            'message'=> 'Data schedule created successfully'
        ];  
        return redirect()->route('siswa')->with('success', 'Data Murid Berhasil Ditambahkan');
    }
}
