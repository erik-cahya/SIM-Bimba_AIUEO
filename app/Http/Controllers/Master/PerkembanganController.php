<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $data['auth'] = env('APP_AUTH', 'Kepala_staff');

        $data['data_murid'] = DB::table('murid')->get();

        // untuk menampilkan duplicate data
        $data['get_name'] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->select('perkembangan.id_murid', 'perkembangan.id_user', 'nama_murid', DB::raw('count(`nama_murid`) as muridname'))->groupBy('nama_murid', 'id_user', 'id_murid')->having('muridname', '>=', 1)->where('perkembangan.id_user', Auth::user()->id_user)->get();

        $data["data_perkembangan"] = DB::table('perkembangan')->orderBy('tgl_perkembangan', 'DESC')->get();
        // dd($data["data_perkembangan"]->firstWhere('id_murid', 2));


        // if (Murid::where('id_murid', '=', 4)->exists()) {
        //     echo 'user ada';
        // } else {
        //     echo 'user tidak ada';
        // }
        // dd($data);
        // dd($data["data_murid"]);

        return view('master.perkembangan.perkembangan_murid', $data);
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
        $request->validate(
            ['deskripsi' => 'required'],
            ['tgl_perkembangan' => 'required']
        );
        // dd($request->all());
        // if (Perkembangan::where('id_murid', $request->id_murid)->count() >= 1) {

        //     if (Perkembangan::where('id_user', '=', Auth::user()->id_user)->exists()) {
        //         dd('data murid sudah diambil');
        //     }

        //     $form_data = [
        //         'id_user' => Auth::user()->id_user,
        //         'id_murid' => $request->id_murid,
        //         'tgl_perkembangan' => $request->tanggal_perkembangan,
        //         'deskripsi' => $request->deskripsi,
        //     ];

        //     // dd($form_data);

        //     Perkembangan::create($form_data);
        //     return redirect()->back()->with('success', 'Data Perkembangan Berhasil ditambahkan');
        // }
        // dd($request->all());
        $form_data = [
            'id_user' => Auth::user()->id_user,
            'id_murid' => $request->id_murid,
            'tgl_perkembangan' => $request->tanggal_perkembangan,
            'deskripsi' => $request->deskripsi,
        ];

        // dd($form_data);

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
        // $data['auth'] = env('APP_AUTH', 'Kepala_staff');
        $data['data_murid'] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->where('perkembangan.id_murid', '=', $id_murid)->get();

        $data['get_name'] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->where('perkembangan.id_murid', '=', $id_murid)->first('nama_murid');

        return view('master.perkembangan.detail_perkembangan', $data);
    }

    public function filter(Request $request)
    {
        // convert format date
        $filter_date = date('Y-m-d', strtotime($request->filter_date));
        // $data['auth'] = env('APP_AUTH', 'Kepala_staff');

        $data["get_name"] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->join('users', 'users.id_user', '=', 'perkembangan.id_user')->where('tgl_perkembangan', $filter_date)->get();

        return view('master.perkembangan.perkembangan_murid', $data);
    }
}
