<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Paket;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["data_siswa"] = Murid::all();
        $data["data_paket"] = Paket::all();
        $data['auth'] = 'kepala_staff';
        return view('master.siswa.data_siswa', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_murid' => 'required|unique:murid',
            'tanggal_lahir' => 'required',
            'tanggal_masuk' => 'required',
            'alamat' => 'required',
            'nama_ortu' => 'required|unique:murid',
            'no_telp' => 'required',
            'nama_paket' => 'required'
        ]);
        $form_data = [
            'nama_murid' => $request->nama_murid,
            'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
            'tanggal_masuk' => date('Y-m-d', strtotime($request->tanggal_masuk)),
            'alamat' => $request->alamat,
            'nama_ortu' => $request->nama_ortu,
            'no_telp' => $request->no_telp,
            'nama_paket' => $request->nama_paket,
        ];
        Murid::create($form_data);

        $message = [
            'alert-type' => 'success',
            'message' => 'Data schedule created successfully'
        ];
        return redirect('/siswa')->with('success', 'Data Murid Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Murid $siswa)
    {
        // dd($request->all());
        $request->validate([
            'nama_murid' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_masuk' => 'required',
            'alamat' => 'required',
            'nama_ortu' => 'required',
            'no_telp' => 'required',
            'nama_paket' => 'required'
        ]);

        $siswa->update($request->all());
        return redirect('/siswa')->with('success', 'Data Murid Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Murid $siswa)
    {
        Murid::destroy($siswa->id_murid);
        return redirect('/siswa')->with('success', 'Data Murid Berhasil Dihapus');
    }
}
