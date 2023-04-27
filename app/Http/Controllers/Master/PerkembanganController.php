<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerkembanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['auth'] = env('APP_AUTH', 'Kepala_staff');;
        $data["data_perkembangan"] = Perkembangan::all();
        $data['get_name'] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->select('perkembangan.id_murid', 'perkembangan.id_user', 'tgl_perkembangan as tgl', 'nama_murid', DB::raw('count(`nama_murid`) as muridname'))->groupBy('nama_murid',  'id_user', 'tgl', 'id_murid')->having('muridname', '>=', 1)->get();

        // dd($data["get_name"]);

        return view('master.murid.perkembangan.perkembangan_murid', $data);
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

        $form_data = [
            'id_murid' => $request->id_murid,
            'id_user' => 3,
            'tanggal_perkembangan' => $request->tanggal_perkembangan,
            'tgl_perkembangan' => $request->tanggal_perkembangan,
            'deskripsi' => $request->deskripsi,
        ];

        Perkembangan::create($form_data);
        return redirect()->back()->with('success', 'Data Perkembangan Berhasil ditambahkan');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /** 
     * view data detail perkembangan
     */
    public function detail($id_murid, Request $request)
    {
        $data['auth'] = env('APP_AUTH', 'Kepala_staff');;
        $data['data_murid'] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->where('perkembangan.id_murid', '=', $id_murid)->get();

        $data['get_name'] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->where('perkembangan.id_murid', '=', $id_murid)->first('nama_murid');

        return view('master.murid.perkembangan.detail_perkembangan', $data);
    }

    public function filter(Request $request)
    {
        // convert format date
        $filter_date = date('Y-m-d', strtotime($request->filter_date));
        $data['auth'] = env('APP_AUTH', 'Kepala_staff');;

        $data["get_name"] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->join('users', 'users.id_user', '=', 'perkembangan.id_user')->where('tgl_perkembangan', $filter_date)->get();

        return view('master.murid.perkembangan.perkembangan_murid', $data);
    }
}
