<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        // return redirect('/dashboard');
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
        // return $infologin;

        $data_user = DB::table('users')
        ->where('username', $request->username)
        ->where('password', $request->password)
        ->get();
        $data = $data_user->toArray();
        // return $data_user;

        if (!empty($data)) {
            return redirect('/dashboard');
            // return redirect()->route('/dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect('/')->with('falled', 'Username dan Password Tidak Valid');
            // return redirect('/')->withErrors('Username dan Password Tidak Valid');
        }
    }

    public function dashboard()
    {
        $ruangans = Ruangan::first()->get();
        $pemesanans = Pemesanan::first()->get();
        // dd($ruangans);
        // $pemesanans = DB::table('pemesanans')
        //     ->join('pelanggans', 'pemesanans.pelanggan_id', '=', 'pelanggans.id')
        //     ->join('jadwals', 'pemesanans.id', '=', 'jadwals.pemesanan_id')
        //     ->select('pemesanans.*', 'pelanggans.nama_pelanggan', 'pelanggans.no_tlp', 'jadwals.mulai', 'jadwals.selesai')
        //     ->get();
            // dd($pemesanans);
        return view('welcome', compact('pemesanans','ruangans'));
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
