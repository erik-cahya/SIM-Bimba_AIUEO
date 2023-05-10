<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    // show pembayaran SPP
    public function showPembayaran()
    {
        $data['auth'] = Auth::user()->hak_akses;
        return view('master.pembayaran.index', $data);
    }

    // Show Laporan SPP Tahunan
    public function showReport()
    {
        $data['auth'] = env('APP_AUTH', 'Kepala_staff');;
        return view('master.pembayaran.report', $data);
    }
}
