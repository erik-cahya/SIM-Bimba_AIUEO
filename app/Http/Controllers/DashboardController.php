<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            // dd(Auth::user()->name);
            return redirect('login');
        }

        // auth : guru & kepala_staff
        $data["count_murid"] = Murid::count();
        $data["count_perkembangan_murid"] = Perkembangan::select('id_murid', DB::raw('count(`id_murid`) as murid_id'))->groupBy('id_murid')->having('murid_id', '>=', 1)->where('id_user', Auth::user()->id_user)->count();
        return view('home', $data);
    }
}
