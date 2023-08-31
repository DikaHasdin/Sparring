<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function destroy($id,$id_item)
    {
        DB::table('jasas')
        ->where('paket_id', '=', $id_item)
        ->where('MAX(id)')->delete();

        $transaksis = DB::table('transaksis')
            ->join('ruangans', 'transaksis.ruangan_id', '=', 'ruangans.id')
            ->join('pelanggans', 'transaksis.pelanggan_id', '=', 'pelanggans.id')
            ->join('pemesanans', 'transaksis.pemesanan_id', '=', 'pemesanans.id')
            ->select('transaksis.*', 'ruangans.*', 'pelanggans.*', 'pemesanans.*')
            ->where('transaksis.id', '=', $id)
            ->get();
        
            $item = DB::table('transaksis')
            ->join('jasas', 'transaksis.id', '=', 'jasas.transaksi_id')
            ->join('pakets', 'jasas.paket_id', '=', 'pakets.id')
            ->select( DB::raw('SUM(jasas.jumlah) AS jumlah, jasas.paket_id, transaksis.id, pakets.nama_paket, pakets.harga_paket'))
            ->where('transaksis.id', '=', $id)
            ->groupBy('jasas.paket_id')
            ->groupBy('transaksis.id')
            ->groupBy('pakets.nama_paket')
            ->groupBy('pakets.harga_paket')
            ->get();

            $paket = DB::table('pakets')
            ->get();
            
            $menu = DB::table('menus')
            ->get();
            // return $item;
            
        return view('transaksi.show', compact('transaksis','item','paket','menu', 'id'));
        // return redirect()->route('pakets.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
