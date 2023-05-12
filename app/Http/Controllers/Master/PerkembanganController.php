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
        $data['data_murid'] = DB::table('murid')->get();
        $data['get_name'] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->select('perkembangan.id_murid', 'perkembangan.id_user', 'nama_murid', DB::raw('count(`nama_murid`) as muridname'))->groupBy('nama_murid', 'id_user', 'id_murid')->having('muridname', '>=', 1)->where('perkembangan.id_user', Auth::user()->id_user)->get();
        $data["data_perkembangan"] = DB::table('perkembangan')->orderBy('tgl_perkembangan', 'DESC')->get();
        $data['get_data_perkembangan'] = DB::table('perkembangan')->join('users', 'users.id_user', '=', 'perkembangan.id_user')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->orderBy('tgl_perkembangan', 'DESC')->get();

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
        // dd($request->all());
        $request->validate(
            ['deskripsi' => 'required'],
            ['tanggal_perkembangan' => 'required']
        );
        if ($request->tanggal_perkembangan === null) {
            $tanggal_perkembangan = date('Y-m-d');
        } else {
            $tanggal_perkembangan = $request->tanggal_perkembangan;
        }
        $form_data = [
            'id_user' => Auth::user()->id_user,
            'id_murid' => $request->id_murid,
            'tgl_perkembangan' => $tanggal_perkembangan,
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
    public function update(Request $request, Perkembangan $perkembangan)
    {
        // dd($request->all());
        DB::table('perkembangan')->where('id_perkembangan', $request->id_perkembangan)->update(
            [
                'tgl_perkembangan' => date('Y-m-d', strtotime($request->tanggal_perkembangan)),
                'deskripsi' => $request->deskripsi
            ]
        );
        return back()->with('success', 'Data Perkembangan Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perkembangan $perkembangan)
    {
        Perkembangan::destroy($perkembangan->id_perkembangan);
        return back()->with('delete', 'Data Murid Berhasil Dihapus');
    }

    /**
     * view data detail perkembangan
     */
    public function detail($id_murid, Request $request)
    {
        $data['data_murid'] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->where('perkembangan.id_murid', '=', $id_murid)->get();
        $data['get_name'] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->where('perkembangan.id_murid', '=', $id_murid)->first('nama_murid');

        return view('master.perkembangan.detail_perkembangan', $data);
    }

    public function filter(Request $request)
    {

        // convert format date
        $filter_date = date('Y-m', strtotime($request->filter_date));

        $data["get_data_perkembangan"] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->join('users', 'users.id_user', '=', 'perkembangan.id_user')->where('tgl_perkembangan', 'LIKE', $filter_date . '%')->get();

        return view('master.perkembangan.perkembangan_murid', $data);
    }
}
