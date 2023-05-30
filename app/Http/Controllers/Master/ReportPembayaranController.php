<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportPembayaranController extends Controller
{
    // Show Laporan SPP Tahunan
    public function index()
    {
        $data["get_data_pembayaran"] = DB::table('pembayaran')->join('murid', 'murid.id_murid', '=', 'pembayaran.id_murid')->join('paket', 'paket.id_paket', '=', 'pembayaran.id_paket')->get();
        $data['date_filter'] = null;
        return view('master.pembayaran.report_pembayaran', $data);
    }

    public function filter(Request $request)
    {
        // convert format date
        $filter_date = date('Y-m', strtotime($request->filter_date));
        $data['date_filter'] = date('Y-m', strtotime($request->filter_date));

        $data["get_data_pembayaran"] = DB::table('pembayaran')->join('murid', 'murid.id_murid', '=', 'pembayaran.id_murid')->join('paket', 'paket.id_paket', '=', 'pembayaran.id_paket')->where('tanggal_bayar', 'LIKE', $filter_date . '%')->get();
        // dd($data['get_data_pembayaran']);

        return view('master.pembayaran.report_pembayaran', $data);
    }
}
