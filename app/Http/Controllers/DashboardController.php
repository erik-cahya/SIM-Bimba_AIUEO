<?php

namespace App\Http\Controllers;

use App\Models\AlokasiMurid;
use App\Models\Murid;
use App\Models\Pembayaran;
use App\Models\Perkembangan;
use App\Models\User;
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
        $data["count_guru"] = DB::table('users')->where('hak_akses', 'guru')->count();

        $data["count_perkembangan_murid"] = AlokasiMurid::select('id_murid', DB::raw('count(`id_murid`) as murid_id'))->groupBy('id_murid')->having('murid_id', '>=', 1)->where('id_user', Auth::user()->id_user)->count();
        $data["count_data_perkembangan"] = DB::table('perkembangan')->where('perkembangan.id_user', Auth::user()->id_user)->count();
        $data["data_murid_wali"] = DB::table('murid')->where('id_user', Auth::user()->id_user)->get();

        if (Auth::user()->hak_akses === 'kepala_staff') {
            $data['pembayaran_januari'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-01-%')->sum('jumlah_bayar');
            $data['pembayaran_februari'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-02-%')->sum('jumlah_bayar');
            $data['pembayaran_maret'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-03-%')->sum('jumlah_bayar');
            $data['pembayaran_april'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-04-%')->sum('jumlah_bayar');
            $data['pembayaran_mei'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-05-%')->sum('jumlah_bayar');
            $data['pembayaran_juni'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-06-%')->sum('jumlah_bayar');
            $data['pembayaran_juli'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-07-%')->sum('jumlah_bayar');
            $data['pembayaran_agustus'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-08-%')->sum('jumlah_bayar');
            $data['pembayaran_september'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-09-%')->sum('jumlah_bayar');
            $data['pembayaran_oktober'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-10-%')->sum('jumlah_bayar');
            $data['pembayaran_november'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-11-%')->sum('jumlah_bayar');
            $data['pembayaran_desember'] = Pembayaran::where('tanggal_bayar', 'LIKE', '%-12-%')->sum('jumlah_bayar');
            $data['total_pendapatan'] = number_format(Pembayaran::sum('jumlah_bayar'), 0, '', '.');
        }

        if (Auth::user()->hak_akses === 'guru') {
            $data['data_alokasi'] = DB::table('alokasi_murid')->where('id_user', Auth::user()->id_user)->get();
        }

        if (Auth::user()->hak_akses === 'wali_murid') {
            $murid = DB::table('murid')->select('id_murid')->where('id_user', Auth::user()->id_user)->get()[0];
            $data['perkembangan_januari'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-01-%')->count();
            $data['perkembangan_februari'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-02-%')->count();
            $data['perkembangan_maret'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-03-%')->count();
            $data['perkembangan_april'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-04-%')->count();
            $data['perkembangan_mei'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-05-%')->count();
            $data['perkembangan_juni'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-06-%')->count();
            $data['perkembangan_juli'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-07-%')->count();
            $data['perkembangan_agustus'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-08-%')->count();
            $data['perkembangan_september'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-09-%')->count();
            $data['perkembangan_oktober'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-10-%')->count();
            $data['perkembangan_november'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-11-%')->count();
            $data['perkembangan_desember'] = DB::table('perkembangan')->where('id_murid', $murid->id_murid)->where('tgl_perkembangan', 'LIKE', '%-12-%')->count();
        }


        // dd($data['perkembangan_januari']);

        return view('dashboard', $data);
    }
}
