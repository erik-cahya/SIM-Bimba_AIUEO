<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index');
    }

    public function authenticate(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     dd(auth());
        //     return redirect()->intended('/dashboard');

        // }
        // return back()->with('loginError', 'Login Failed');

        $data['auth'] = 'kepala_staff';
        return view('home', $data);
    }
}
