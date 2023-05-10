<?php

namespace App\Http\Controllers\Master;

use App\Models\Jenis;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JenisPaketBimbelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data_paket'] = DB::table('paket')->join('jenis', 'jenis.id_jenis', '=', 'paket.id_jenis')->get();
        $data['data_jenis'] = Jenis::all();
        return view('master.jenis_paket.index', $data);
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
        dd($request->all());
        Jenis::create($request->all());
        return redirect('/jenis')->with('success', 'Jenis Paket Baru Berhasil Ditambahkan');
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
    public function update(Request $request, Jenis $jenis)
    {

        if ($jenis->update($request->all()) === true) {
            dd('data updated');
        }
        return redirect('/jenis')->with('success', 'Data Jenis Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis $jenis)
    {
        dd($jenis->id_jenis);
        if (Jenis::destroy($jenis->id_jenis) === true) {
            dd('harusnya kehapus');
        }
        return redirect('/jenis')->with('success', 'Data Paket Berhasil Dihapus');
    }
}
