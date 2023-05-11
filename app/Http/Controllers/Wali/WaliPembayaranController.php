<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaliPembayaranController extends Controller
{
    public function index()
    {
        return view('wali.pembayaran.index');
    }
}
