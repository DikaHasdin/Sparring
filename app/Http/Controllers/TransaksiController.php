<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Ruangan;
use App\Models\Transaksi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(5);
        return view('transaksi.index', compact('transaksis'));
    }

    public function create(): View
    {
        return view('transaksi.cek_nomor');
    }

    public function cek_nomor(Request $request)
    {
        $this->validate($request, [
            'no_tlp'     => 'required',
        ]);

        // DB::select('select * from pelanggans where active = ?', $no_tlp);
        $data_pelanggan = DB::table('pelanggans')->where('no_tlp', $request->no_tlp)->get();
        $data = $data_pelanggan->toArray();

        if (!empty($data)) {
            $data_ruanagn = Ruangan::all();
            $data_paket = Paket::all();
            return view('transaksi.create', compact('data', 'data_ruanagn', 'data_paket'));
        } else {
            return "Data Tidak Ada";
        }

        return "Error";
    }
}
