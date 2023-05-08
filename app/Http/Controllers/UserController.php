<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data["data_paket"] = Paket::all();
        $data["auth"] = env('APP_AUTH', 'Kepala_staff');
        $data["data_user"] = DB::table('users')->get();
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|unique:users',
            'username' => 'required|unique:users',
        ]);
        $request = [
            'nama_user' => $request->nama_user,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'hak_akses' => $request->hak_akses,

        ];

        User::create($request);
        return redirect()->back()->with('success', 'Data Perkembangan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());

        if ($request->password === null) {
            $request = [
                'id_user' => $request->id_user,
                'nama_user' => $request->nama_user,
                'hak_akses' => $request->hak_akses,
                'username' => $request->username,
            ];
        } else {
            $request = [
                'id_user' => $request->id_user,
                'nama_user' => $request->nama_user,
                'hak_akses' => $request->hak_akses,
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ];
        }
        $user->update($request);
        return redirect('/user')->with('success', 'Data User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id_user);
        return redirect('/user')->with('success', 'Data User Berhasil Dihapus');
    }
}
