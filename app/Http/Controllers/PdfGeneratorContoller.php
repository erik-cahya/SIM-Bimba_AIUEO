<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use PDF;

class PdfGeneratorContoller extends Controller
{
    public function index(Request $request)
    {
        if ($request->filter == null) {
            $data["periode"] = "All Periode";
            $data['get_data_perkembangan'] = DB::table('perkembangan')->join('users', 'users.id_user', '=', 'perkembangan.id_user')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->orderBy('tgl_perkembangan', 'DESC')->get();
            $pdf = PDF::loadView('pdf.pdf_generator', $data);
            return $pdf->stream('laporan_perkembangan_' . $data["periode"] . '.pdf');
        } else {

            $date = Carbon::parse($request->filter)->locale('id');
            $date->settings(['formatFunction' => 'translatedFormat']);
            $data["periode"] = $date->format('F Y');
            $data["get_data_perkembangan"] = DB::table('perkembangan')->join('murid', 'murid.id_murid', '=', 'perkembangan.id_murid')->join('users', 'users.id_user', '=', 'perkembangan.id_user')->where('tgl_perkembangan', 'LIKE', $request->filter . '%')->get();


            $pdf = PDF::loadView('pdf.pdf_generator', $data);
            return $pdf->stream('laporan_perkembangan_' . $data["periode"] . '.pdf');
        }
    }
}
