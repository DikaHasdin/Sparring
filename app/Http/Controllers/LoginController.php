<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view("Login/index");
    }

    public function Login(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/dashboard');
            // return redirect()->route('/dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect('/')->with('falled', 'Username dan Password Tidak Valid');
            // return redirect('/')->withErrors('Username dan Password Tidak Valid');
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function Register()
    {
        return view("Login/register");
    }
}
