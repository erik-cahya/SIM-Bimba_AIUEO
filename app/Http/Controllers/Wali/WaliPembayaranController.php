<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WaliPembayaranController extends Controller
{
    public function index()
    {
        $data['murid'] = DB::table('murid')->select('id_murid', 'nama_murid')->where('id_user', Auth::user()->id_user)->get();
        $data['data_pembayaran'] = DB::table('pembayaran')->join('murid', 'murid.id_murid', '=', 'pembayaran.id_murid')->join('paket', 'paket.id_paket', '=', 'pembayaran.id_paket')->where('pembayaran.id_murid', $data['murid'][0]->id_murid)->get();
        return view('wali.pembayaran.index', $data);
    }

    public function filter(Request $request)
    {
        // convert format date
        $filter_date = date('Y-m', strtotime($request->filter_date));

        $data['murid'] = DB::table('murid')->select('id_murid', 'nama_murid')->where('id_user', Auth::user()->id_user)->get();
        $data["data_pembayaran"] = DB::table('pembayaran')->join('murid', 'murid.id_murid', '=', 'pembayaran.id_murid')->join('paket', 'paket.id_paket', '=', 'pembayaran.id_paket')->where('tanggal_bayar', 'LIKE', $filter_date . '%')->where('pembayaran.id_murid', $data['murid'][0]->id_murid)->get();
        // dd($data['get_data_pembayaran']);

        return view('wali.pembayaran.index', $data);
    }
}
