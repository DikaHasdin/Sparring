<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
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

    public function select_member(Request $request)
    {
        $this->validate($request, [
            'jam_mulai' => 'required',
            'jumlah_jam' => 'required|integer',
        ]);
        // $data_pelanggan = DB::table('pemesanans')->where('id', max('id'))->get();
        // $data_pemesanan = DB::select(DB::raw('select * from pemesanans where id = (select max(`id`) from pemesanans)'));
        $pemesanan_id = DB::table('pemesanans')->max('id');
        // return $pemesanan_id+1;
        // return $request->jam_mulai;

        Pemesanan::create([
            'id' => $pemesanan_id + 1,
            'tgl_pemesanan'     => $request->tgl_transaksi,
            'jam_mulai'         => $request->jam_mulai,
            'jumlah_jam'        => $request->jumlah_jam,
            'keterangan'        => "-",
            'status_pemesanan'  => "Pesan Ditempat",
            'ruangan_id'        => $request->id_ruangan,
            'paket_id'          => $request->id_paket,
            'pelanggan_id'      => $request->pelanggan_id,
        ]);

        Transaksi::create([
            'tgl_transaksi'     => $request->tgl_transaksi,
            'tot_jasa'          => 0,
            'tot_penjualan'     => 0,
            'status_transaksi'  => "Main",
            'ruangan_id'        => $request->id_ruangan,
            'pelanggan_id'      => $request->pelanggan_id,
            'pemesanan_id'      => $pemesanan_id + 1,
        ]);

        return redirect('/transaksis')->with(['success' => 'Data Berhasil Disimpan']);
    }
}
