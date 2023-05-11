<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaliPerkembanganContoller extends Controller
{
    public function index()
    {
        return view('wali.perkembangan.index');
    }
}
