<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // auth : guru & kepala_staff
        $data["count_murid"] = Murid::count();
        $data['auth'] = "kepala_staff";
        return view('home', $data);
    }
}
