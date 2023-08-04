<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("Login/index");
    }

    public function test() {
        echo '11111';
    }

    public function Login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)){
            return redirect('/dashboard');
            // return redirect()->route('/dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect('/')->with('falled', 'Username dan Password Tidak Valid');
            // return redirect('/')->withErrors('Username dan Password Tidak Valid');
        }
    }
}
