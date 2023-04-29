<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Paket;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["data_murid"] = Murid::all();
        $data["data_paket"] = Paket::all();
        $data['auth'] = env('APP_AUTH', 'kepala_staff'); // ################################### ini disesuaikan
        return view('master.murid.data_murid', $data);
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
            'nama_ortu' => 'required',
            'no_telp' => 'required',
            'nama_paket' => 'required'
        ]);
        $form_data = [
            'id_user' => 1, // ################################### ini disesuaikan
            'nama_murid' => $request->nama_murid,
            'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
            'tanggal_masuk' => date('Y-m-d', strtotime($request->tanggal_masuk)),
            'alamat' => $request->alamat,
            'nama_ortu' => $request->nama_ortu,
            'no_telp' => $request->no_telp,
            'nama_paket' => $request->nama_paket,
        ];

        Murid::create($form_data);

        return redirect('/murid')->with('success', 'Data Murid Berhasil Ditambahkan');
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
    public function update(Request $request, Murid $murid)
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

        $murid->update($request->all());
        return redirect('/murid')->with('success', 'Data Murid Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Murid $murid)
    {
        Murid::destroy($murid->id_murid);
        return redirect('/murid')->with('delete', 'Data Murid Berhasil Dihapus');
    }
}
