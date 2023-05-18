<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlokasiMuridController extends Controller
{
    public function index()
    {

        return view('master.alokasi_murid.index');
    }
}
