<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketBimbelController extends Controller
{
    public function index()
    {
        $data["data_paket"] = Paket::all();
        $data["auth"] = "kepala_staff";
        return view('master.paket_bimbel.index', $data);
    }

    public function store(Request $request){
        Paket::create($request->all());
        
        $message = [
            'alert-type'=>'success',
            'message'=> 'Data schedule created successfully'
        ];  
        return redirect()->route('paket')->with('success', 'Data Paket Berhasil Ditambahkan');
    }
}
