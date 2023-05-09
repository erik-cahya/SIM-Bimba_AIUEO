<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // dd(Auth::user()->name);
            return redirect('dashboard');
        }
        // return view('auth.login.index');
        return view('auth.login.index');
    }

    public function customLogin(Request $request)
    {
        // dd($request->all());

        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required'   => 'Login Gagal! Kolom Username Kosong!',
                'password.required'   => 'Login Gagal! Kolom Password Kosong!',
            ]
        );

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("login")->with('success', 'Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        /* $request->validate([
            'name' => 'required',
            'username' => 'required|username|unique:users',
            'password' => 'required|min:6',
        ]); */


        // $data = $request->all();
        $data = [
            'nama_user' => $request->nama_user,
            'username' => $request->username,
            'password' => $request->password,
            'hak_akses' => 'kepala_staff'
        ];
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'nama_user' => $data['nama_user'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'hak_akses' => $data['hak_akses'],
        ]);
    }

    // public function dashboard()
    // {
    //     if (Auth::check()) {
    //         // dd(Auth::user()->name);
    //         return view('auth.index');
    //     }

    //     return redirect("login")->withSuccess('You are not allowed to access');
    // }

    public function signOut(Request $request)
    {
        Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect('login');
    }
}
