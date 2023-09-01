<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Jasa;
use App\Models\Jurnal;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\Ruangan;
use App\Models\Transaksi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class TransaksiController extends Controller
{
    public function index()
    {
        // $transaksis = Transaksi::latest()->paginate(5);
        $transaksis = DB::table('transaksis')
            ->join('ruangans', 'transaksis.ruangan_id', '=', 'ruangans.id')
            ->join('pelanggans', 'transaksis.pelanggan_id', '=', 'pelanggans.id')
            ->select('transaksis.*', 'ruangans.nama_ruangan', 'pelanggans.nama_pelanggan')
            ->get();

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
            $data_ruanagn = Ruangan::all();
            $data_paket = Paket::all();
            $pelanggan_id = DB::table('pelanggans')->max('id');
            $nomor_telpon = $request->no_tlp;
            return view('transaksi.createnonmemeber', compact('data_ruanagn', 'data_paket', 'pelanggan_id', 'nomor_telpon'));
        }

        return "Error";
    }

    public function select_member(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'jam_mulai' => 'required',
            // 'jumlah_jam' => 'required|integer',
        ]);
        // $data_pelanggan = DB::table('pemesanans')->where('id', max('id'))->get();
        // $data_pemesanan = DB::select(DB::raw('select * from pemesanans where id = (select max(`id`) from pemesanans)'));
        $pemesanan_id = DB::table('pemesanans')->max('id');
        $transaksi_id = DB::table('transaksis')->max('id');

        $jumlah_jam_paket = DB::table('pakets')
            ->select('jumlah_jam')
            ->where('id', '=', $request->id_paket)
            ->get('array');

        // dd($jumlah_jam_paket);
        foreach ($jumlah_jam_paket as $jmh_jam) {
           $jam_paket = $jmh_jam->jumlah_jam;
        }

        // return $pemesanan_id+1;
        // return $request->jam_mulai;

        Pemesanan::create([
            'id'                => $pemesanan_id + 1,
            'tgl_pemesanan'     => $request->tgl_transaksi,
            'jam_mulai'         => $request->jam_mulai,
            'jumlah_jam'        => $jam_paket,
            'keterangan'        => "-",
            'status_pemesanan'  => "Pesan Ditempat",
            'ruangan_id'        => $request->id_ruangan,
            'paket_id'          => $request->id_paket,
            'pelanggan_id'      => $request->pelanggan_id,
        ]);

        Transaksi::create([
            'id'                => $transaksi_id + 1,
            'tgl_transaksi'     => $request->tgl_transaksi,
            'tot_jasa'          => 0,
            'tot_penjualan'     => 0,
            'status_transaksi'  => "Main",
            'ruangan_id'        => $request->id_ruangan,
            'pelanggan_id'      => $request->pelanggan_id,
            'pemesanan_id'      => $pemesanan_id + 1,
        ]);

        Jasa::create([
            'jumlah'            => 1,
            'paket_id'          => $request->id_paket,
            'transaksi_id'      => $transaksi_id + 1,
        ]);

        $jumlah_jam = -1 * $request->jumlah_jam;
        $jam_mulaii = date('H', strtotime($request->jam_mulai));
        $jam_selesai = date('H:i', strtotime($jumlah_jam . 'time', strtotime($request->jam_mulai)));

        $a = ($jam_mulaii) + ($request->jumlah_jam);

        if ($a < 24) {
            Jadwal::create([
                'tgl_jadwal'       => $request->tgl_transaksi,
                'mulai'            => $request->jam_mulai,
                'selesai'          => $jam_selesai,
                'pemesanan_id'     => $pemesanan_id + 1,
                'ruangan_id'       => $request->pelanggan_id,
            ]);
        } elseif ($a >= 24) {
            Jadwal::create([
                'tgl_jadwal'       => $request->tgl_transaksi,
                'mulai'            => $request->jam_mulai,
                'selesai'          => "23:59",
                'pemesanan_id'     => $pemesanan_id + 1,
                'ruangan_id'       => $request->pelanggan_id,
            ]);
            Jadwal::create([
                'tgl_jadwal'       => $request->tgl_transaksi,
                'mulai'            => "00:00",
                'selesai'          => $jam_selesai,
                'pemesanan_id'     => $pemesanan_id + 1,
                'ruangan_id'       => $request->pelanggan_id,
            ]);
        }

        return redirect('/transaksis')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function select_nonmember(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'jam_mulai' => 'required',
            // 'jumlah_jam' => 'required|integer',
        ]);
        // $data_pelanggan = DB::table('pemesanans')->where('id', max('id'))->get();
        // $data_pemesanan = DB::select(DB::raw('select * from pemesanans where id = (select max(`id`) from pemesanans)'));
        $pemesanan_id = DB::table('pemesanans')->max('id');
        $transaksi_id = DB::table('transaksis')->max('id');

        $jumlah_jam_paket = DB::table('pakets')
            ->select('jumlah_jam')
            ->where('id', '=', $request->id_paket)
            ->get('array');

        // dd($jumlah_jam_paket);
        foreach ($jumlah_jam_paket as $jmh_jam) {
           $jam_paket = $jmh_jam->jumlah_jam;
        }

        // return $pemesanan_id+1;
        // return $request->jam_mulai;

        Pelanggan::create([
            'id'                => $request->pelanggan_id,
            'nama_pelanggan'    => $request->nama_pelanggan,
            'no_tlp'            => $request->no_tlp,
        ]);

        Pemesanan::create([
            'id'                => $pemesanan_id + 1,
            'tgl_pemesanan'     => $request->tgl_transaksi,
            'jam_mulai'         => $request->jam_mulai,
            'jumlah_jam'        => $jam_paket,
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

        Jasa::create([
            'jumlah'            => 1,
            'paket_id'          => $request->id_paket,
            'transaksi_id'      => $transaksi_id + 1,
        ]);

        $jumlah_jam = -1 * $request->jumlah_jam;
        $jam_mulaii = date('H', strtotime($request->jam_mulai));
        $jam_selesai = date('H:i', strtotime($jumlah_jam . 'time', strtotime($request->jam_mulai)));

        $a = ($jam_mulaii) + ($request->jumlah_jam);

        if ($a < 24) {
            Jadwal::create([
                'tgl_jadwal'       => $request->tgl_transaksi,
                'mulai'            => $request->jam_mulai,
                'selesai'          => $jam_selesai,
                'pemesanan_id'     => $pemesanan_id + 1,
                'ruangan_id'       => $request->pelanggan_id,
            ]);
        } elseif ($a >= 24) {
            Jadwal::create([
                'tgl_jadwal'       => $request->tgl_transaksi,
                'mulai'            => $request->jam_mulai,
                'selesai'          => "23:59",
                'pemesanan_id'     => $pemesanan_id + 1,
                'ruangan_id'       => $request->pelanggan_id,
            ]);
            Jadwal::create([
                'tgl_jadwal'       => $request->tgl_transaksi,
                'mulai'            => "00:00",
                'selesai'          => $jam_selesai,
                'pemesanan_id'     => $pemesanan_id + 1,
                'ruangan_id'       => $request->pelanggan_id,
            ]);
        }

        return redirect('/transaksis')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function show(string $id)
    {
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
    }

    public function hapus_item($id,$id_item)
    {
        DB::table('jasas')
        ->where('paket_id', '=', $id_item)->take(1)->delete();

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

    public function tambah_item($id,$id_item)
    {
        Jasa::create([
            'jumlah'            => 1,
            'paket_id'          => $id_item,
            'transaksi_id'      => $id,
        ]);

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
    
    public function save_transaksi($id,$total,$tgl)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'tot_jasa'  => $total,
            'status_transaksi'  => "Selesai",
        ]);

        Jurnal::create([
            'tgl_jurnal'     => $tgl,
            'posisi_dk'      => "Debet",
            'nominal_jurnal' => $total,
            'akun_id'        => "1101",
            'transaksi_id'   => $id,
        ]);
        
        Jurnal::create([
            'tgl_jurnal'     => $tgl,
            'posisi_dk'      => "Kredit",
            'nominal_jurnal' => $total,
            'akun_id'        => "4101",
            'transaksi_id'   => $id,
        ]);
            
        $transaksis = DB::table('transaksis')
            ->join('ruangans', 'transaksis.ruangan_id', '=', 'ruangans.id')
            ->join('pelanggans', 'transaksis.pelanggan_id', '=', 'pelanggans.id')
            ->select('transaksis.*', 'ruangans.nama_ruangan', 'pelanggans.nama_pelanggan')
            ->get();

        return view('transaksi.index', compact('transaksis'));
    }
}
