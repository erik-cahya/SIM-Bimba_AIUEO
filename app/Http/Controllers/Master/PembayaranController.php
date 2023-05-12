<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    // show pembayaran SPP
    public function index()
    {
        $data['data_murid'] = DB::table('murid')->get();
        $data['data_pembayaran'] = DB::table('pembayaran')->join('murid', 'murid.id_murid', '=', 'pembayaran.id_murid')->join('paket', 'paket.id_paket', '=', 'murid.nama_paket')->get();

        return view('master.pembayaran.index', $data);
    }

    public function store(Request $request)
    {
        $getIdPaket = DB::table('murid')->where('id_murid', $request->id_murid)->select('nama_paket')->first();

        $form_data = [
            "id_murid" => $request->id_murid,
            "id_user" => Auth::user()->id_user,
            "jumlah_bayar" => $request->jumlah_bayar,
            "tanggal_bayar" => date('Y-m-d', strtotime($request->tanggal_bayar)),
            "id_paket" => $getIdPaket->nama_paket
        ];

        Pembayaran::create($form_data);
        return back()->with('success', 'Data Pembayaran Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        DB::table('pembayaran')->where('id_pembayaran', $request->id_pembayaran)->update(
            [
                'jumlah_bayar' => $request->jumlah_bayar,
                'tanggal_bayar' => $request->tanggal_bayar
            ]
        );

        return back()->with('success', 'Data Pembayaran Berhasil Diubah');
    }

    public function destroy(Request $request)
    {
        Pembayaran::destroy($request->id_pembayaran);
        return back()->with('delete', 'Data Pembayaran Berhasil Dihapus');
    }
}
