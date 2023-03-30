<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaketBimbelController extends Controller
{
    public function index()
    {
        $data["auth"] = "kepala_staff";
        return view('master.paket_bimbel.index', $data);
    }
}
