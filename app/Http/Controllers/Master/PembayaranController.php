<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;

class PembayaranController extends Controller
{
    // show pembayaran SPP
    public function index(Request $request)
    {
        $data['data_murid'] = DB::table('murid')->join('paket', 'paket.id_paket', '=', 'murid.id_paket')->get();
        $data['data_pembayaran'] = DB::table('pembayaran')->join('murid', 'murid.id_murid', '=', 'pembayaran.id_murid')->join('paket', 'paket.id_paket', '=', 'murid.id_paket')->get();

        $data['tanggal_filter'] = $request['filter_date'];
        if ($data['tanggal_filter'] === null) {
            $data['tanggal_filter'] = date('Y-m');
        }
        return view('master.pembayaran.index', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if (Pembayaran::where('tanggal_bayar', 'LIKE', date('Y-m', strtotime($request->tanggal_bayar)) . '-%')->where('id_murid', $request->id_murid)->exists()) {
            $getIdPembayaran = DB::table('pembayaran')->where('tanggal_bayar', 'LIKE', date('Y-m', strtotime($request->tanggal_bayar)) . '-%')->select('id_pembayaran')->first();
            DB::table('pembayaran')->where('id_pembayaran', $getIdPembayaran->id_pembayaran)->update(
                [
                    'tanggal_bayar' => $request->tanggal_bayar
                ]
            );
            return back()->with('success', 'Data Pembayaran pada tanggal ' . date('d-m-Y', strtotime($request->tanggal_bayar)) . ' berhasil diubah');
        }

        $getIdPaket = DB::table('murid')->where('id_murid', $request->id_murid)->select('id_paket')->first();
        $form_data = [
            "id_murid" => $request->id_murid,
            "id_user" => Auth::user()->id_user,
            "jumlah_bayar" => $request->jumlah_bayar,
            "tanggal_bayar" => date('Y-m-d', strtotime($request->tanggal_bayar)),
            "id_paket" => $getIdPaket->id_paket
        ];
        // dd($form_data);
        Pembayaran::create($form_data);
        return back()->with('success', 'Data Pembayaran Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        if (Pembayaran::where('tanggal_bayar', 'LIKE', date('Y-m', strtotime($request->tanggal_bayar)) . '-%')->exists()) {
            $getIdPembayaran = DB::table('pembayaran')->where('tanggal_bayar', 'LIKE', date('Y-m', strtotime($request->tanggal_bayar)) . '-%')->select('id_pembayaran')->first();
            DB::table('pembayaran')->where('id_pembayaran', $getIdPembayaran->id_pembayaran)->update(
                [
                    'tanggal_bayar' => $request->tanggal_bayar
                ]
            );
            return back()->with('success', 'Data Pembayaran pada tanggal ' . date('d-m-Y', strtotime($request->tanggal_bayar)) . ' berhasil diubah');
        }
        // dd($request->all());
        DB::table('pembayaran')->where('id_pembayaran', $request->id_pembayaran)->update(
            [
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

    public function pembayaranFilter(Request $request)
    {
    }
}
